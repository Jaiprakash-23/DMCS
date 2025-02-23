<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use App\Models\allempsalary;
use App\Models\SalaryDistribution;
use Illuminate\Http\Request;
use App\Models\AllEmpAttendance;
use Illuminate\Support\Facades\DB;
class ReportsController extends Controller
{
    //
    public function all_employee(){
        $all_employee_report=AllEmployeeEmp::get()->all();
// dd($all_employee_report);
        return view('allemploy', compact('all_employee_report'));

    }
    public function allemploy_list_section(){
        $all_employee_report=AllEmployeeEmp::get()->all();
// dd($all_employee_report);
        return view('allemploy', compact('all_employee_report'));

    }


    public function all_employee_attendance(){
        $all_employee_attendance=AllEmpAttendance::get()->all();
        // dd($all_employee_report);
                return view('all_employ-attendance', compact('all_employee_attendance'));

    }
    public function all_employee_salary_report(){
        $all_empl_salary=allempsalary::get()->all();
        return view('allemp_salary' ,compact('all_empl_salary'));
    }



    public function all_employee_sitename(){
        $data['site_salary_data'] = DB::table('salary_distribution')
    ->groupBy('site_name')
    ->get()
    ->toArray();
// dd($data);
return view('sitename-salary', $data);


    }
}
