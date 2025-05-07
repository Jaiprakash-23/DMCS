<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    //
    public function my_profile()
    {
        $user = Auth::user();
        $dpt = DB::table('department')->where('id', $user->department)->value('department');
        $designation = DB::table('designation')->where('id', $user->designation)->value('designation');
       
        $report = DB::table('department')->where('id', $user->reports_to)->value('department');
        
        $site = DB::table('location_site')->where('id', $user->site)->value('site_name');
        
        return view('my_profile', compact('user','designation','dpt','site','report'));
    }
    public function my_attendance()
    {
        return view('my-attendance');
    }
    public function my_salary()
    {
      
        $emp = DB::table('generate_salary')
            ->join('emp', 'generate_salary.emp_id', '=', 'emp.id')
            ->join('department', 'emp.department', '=', 'department.id')
            ->join('designation', 'emp.designation', '=', 'designation.id')
            ->join('location_site', 'emp.site', '=', 'location_site.id')
            ->where('generate_salary.emp_id', Auth::user()->id)
            ->select('generate_salary.*', 'emp.fullname as emp_name','location_site.site_name as site' ,'emp.emp_id as empid', 'emp.date_of_joining', 'department.department', 'designation.designation')
            ->get();
        $total_salary = 0;
        $Paid_Salary = 0;
        
        foreach ($emp as $key => $value) {
            $total_salary += $value->salary_month;
            $Paid_Salary += $value->net_pay;
           
        }
        // dd($emp);

        

        return view('my_salary', compact('emp', 'total_salary', 'Paid_Salary'));
    }
}
