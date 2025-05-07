<?php

namespace App\Http\Controllers;

use App\Models\Generate_salary;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryDistribution;

use App\Models\AllEmployeeEmp;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class PayRollController extends Controller
{
    public function generate_salary(Request $request)
    {     
        $userDept = Auth::user()->department;
        $userSite = Auth::user()->site;
        $query = DB::table('generate_salary')
            ->join('emp', 'generate_salary.emp_id', '=', 'emp.id')
            ->join('department', 'emp.department', '=', 'department.id')
            ->join('designation', 'emp.designation', '=', 'designation.id')
            ->where(function($query) use ($userDept, $userSite) {
                if($userDept != 1) {
                    $query->where('emp.site', 'emp.site');
                }
                
            })
            ->where(function($query) use ($userDept) {
                // Admin sees all departments >1
                if ($userDept == 1) {
                    $query->where('emp.department', '>', 1);
                }
                // Manager sees departments >=2
                elseif ($userDept == 2) {
                    $query->where('emp.department', '>=', 2);
                }
                // Officer sees departments >=3
                elseif ($userDept == 3) {
                    $query->where('emp.department', '>=', 3);
                }
                // Supervisor sees departments >=4
                elseif ($userDept == 4) {
                    $query->where('emp.department', '>=', 4);
                }
                // Others see only their department (if >1)
                else {
                    $query->where('emp.department', $userDept);
                }
            })
            ->select(
                'generate_salary.*',
                'emp.fullname as emp_name',
                'emp.emp_id as empid',
                'emp.profile_image as profile_image',
                'emp.date_of_joining',
                'department.department',
                'designation.designation'
            );
        if ($request->filled('search')) {
            $request->validate([
                'search' => 'required|string|max:255',
            ]);
            $searchTerm = $request->search;
       
            $query->where(function ($q) use ($searchTerm) {
                $q->where('emp.emp_id', 'like', "%{$searchTerm}%")
                    ->orWhere('emp.fullname', 'like', "%{$searchTerm}%");
            });
        }

        $emp = $query->get();

        // Calculate totals using Laravel's collection methods
        $total_salary = $emp->sum('salary_month');
        $Paid_Salary = $emp->sum('net_pay');
        $balance = $total_salary - $Paid_Salary;

        return view('salary-genrate', compact('emp', 'total_salary', 'Paid_Salary', 'balance'));
    }

    public function generate_salary_search(Request $request)
    {

    }
    public function emp_salary_report()
    {    

        if(Auth::user()->department == 1) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->get();
        } else if (Auth::user()->department == 4) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->where('department', '5')->get();
        } else if (Auth::user()->department == 3) {
            $emp = AllEmployeeEmp::where('site', Auth::user()->site)
            ->whereIn('department', ['4', '5'])
            ->get();
            
        } elseif (Auth::user()->department == 2) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->whereIn('department', ['3','4', '5'])->get();
        }
       
        return view('allemp_salary', compact('emp'));
    }
    public function emp_pf_detail()
    {
        return view('pf');
    }

    public function SalarySlip($id, $date)
    {
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));
        $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
        $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
        $total_days = date("d", strtotime($lastDate));
        $emp = AllEmployeeEmp::where('id', $id)->first();
        $department_emp = Department::where('id', $emp->department)->first();
        $designation_emp = Designation::where('id', $emp->designation)->first();
        $attendance = Attendance::where("emp_id", $emp->id)->where('date', '>=', $firstDate)->where('date', '<=', $lastDate)->get();
        $total_salary = 0;
        $total_working_days = 0;
        foreach ($attendance as $at) {
            $salary_tbl = SalaryDistribution::where("site_name", $at->site_id)->where("designation", $at->designation_id)->first();
            if ($at->attendance_status == 1) {
                $one_daye_salary = $salary_tbl->salary_amount / $total_days;
                $total_salary += $one_daye_salary;
                $total_working_days++;
            }
        }
        // dd($total_working_days);
        $currentMonthSalary = Generate_salary::where("emp_id", $id)
            ->whereYear("created", date('Y'))
            ->whereMonth("created", date('m'))
            ->first();

        return view('salary-slip', compact('total_salary', 'currentMonthSalary', 'emp', 'department_emp', 'designation_emp', 'month', 'total_working_days'));
        // return view('salary-slip',compact('currentMonthSalary','emp','department_emp'));
    }






    public function SalaryGetMonthWise(Request $request)
    {

        $year = date("Y", strtotime($request->month));
        $month = date("m", strtotime($request->month));
        $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
        $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
        if(Auth::user()->department == 1) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->get();
        } else if (Auth::user()->department == 4) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->where('department', '5')->get();
        } else if (Auth::user()->department == 3) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->whereIn('department', ['4', '5'])->get();
        } elseif (Auth::user()->department == 2) {
            $emp = AllEmployeeEmp::where('site',Auth::user()->site)->where('department', '3')->where('department', '4')->where('department', '5')->get();
        }
       
        return view('allemp_salary', compact('emp', 'firstDate', 'lastDate'));

    }

}
