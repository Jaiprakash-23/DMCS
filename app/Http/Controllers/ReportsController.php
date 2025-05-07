<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use App\Models\allempsalary;
use Illuminate\Http\Request;
use App\Models\AllEmpAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ReportsController extends Controller
{
    //
    public function all_employee()
    {

        $all_employee_report = DB::table('emp')
            ->join('department', 'emp.department', '=', 'department.id')
            ->join('designation', 'emp.designation', '=', 'designation.id')
            ->join('location_site', 'emp.site', '=', 'location_site.id')
            ->where('emp.site', Auth::user()->site)
            ->select('emp.*', 'department.department', 'designation.designation', 'location_site.site_name')
            ->get();

        return view('allemploy', compact('all_employee_report'));

    }



    public function employee_delete($id){
        // dd($id);
        $employee = AllEmployeeEmp::find($id);
        if($employee) {
            $employee->delete();
            return redirect()->back()->with('success', 'Employee deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Employee not found.');
        }
    }



    public function allemploy_list_section()
    {
        $all_employee_report = DB::table('emp')
            ->join('department', 'emp.department', '=', 'department.id')
            ->join('designation', 'emp.designation', '=', 'designation.id')
            ->join('location_site', 'emp.site', '=', 'location_site.id')
            ->select('emp.*', 'department.department', 'designation.designation', 'location_site.site_name')
            ->get();

        return view('allemploy', compact('all_employee_report'));

    }

    public function allemploy_list_search(Request $request)
    {

        $search = $request->input('search');
        $all_employee_report = DB::table('emp')
            ->where('emp.site', Auth::user()->site)
            ->join('department', 'emp.department', '=', 'department.id')
            ->join('designation', 'emp.designation', '=', 'designation.id')
            ->join('location_site', 'emp.site', '=', 'location_site.id')
            ->select('emp.*', 'department.department', 'designation.designation', 'location_site.site_name')
            ->where(function ($query) use ($search) {
                $query->where('emp.emp_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('emp.fullname', 'LIKE', '%' . $search . '%');
            })
            ->get();

        return view('allemploy', compact('all_employee_report'));

    }


    public function all_employee_attendance()
    {
        $all_employee_attendance = AllEmpAttendance::get()->all();

        return view('all_employ-attendance', compact('all_employee_attendance'));

    }
    public function all_employee_salary_report()
    {

        if (Auth::user()->department == 1) {
            $all_empl_salary = allempsalary::get()->all();
            $emp = AllEmployeeEmp::where('site', Auth::user()->site)
                ->get();
            return view('allemp_salary', compact('all_empl_salary', 'emp'));

        } else if (Auth::user()->department == 4) {
            $all_empl_salary = allempsalary::get()->all();
            $emp = AllEmployeeEmp::where('site', Auth::user()->site)
                ->where('department', '5')
                ->get();
            return view('allemp_salary', compact('all_empl_salary', 'emp'));
        } else if (Auth::user()->department == 3) {
            $all_empl_salary = allempsalary::get()->all();
            $emp = AllEmployeeEmp::where('site', Auth::user()->site)
                ->where('department', '4')
                ->where('department', '5')
                ->get();
            return view('allemp_salary', compact('all_empl_salary', 'emp'));
        } elseif (Auth::user()->department == 2) {
            $all_empl_salary = allempsalary::get()->all();
            $emp = AllEmployeeEmp::where('site', Auth::user()->site)
                ->where('department', '3')
                ->where('department', '4')
                ->where('department', '5')
                ->get();
            return view('allemp_salary', compact('all_empl_salary', 'emp'));
        } else {
            $all_empl_salary = allempsalary::get()->all();
            $emp = AllEmployeeEmp::where('site', Auth::user()->site)
                ->where('department', '2')
                ->where('department', '3')
                ->where('department', '4')
                ->where('department', '5')
                ->get();
            return view('allemp_salary', compact('all_empl_salary', 'emp'));
        }
    }




    public function all_employee_sitename()
    {
        $data['site_salary_data'] = DB::table('salary_distribution')
            ->groupBy('site_name')
            ->get()
            ->toArray();
           
        return view('sitename-salary', $data);


    }
}
