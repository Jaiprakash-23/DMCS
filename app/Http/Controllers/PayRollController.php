<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryDistribution;
use App\Models\Client_List;
use App\Models\AllEmployeeEmp;
use App\Models\location_site;
use App\Models\Attendance;

class PayRollController extends Controller
{
    public function generate_salary(){
        $emp=AllEmployeeEmp::get();
        return view('salary-genrate',compact('emp'));
    }
    public function emp_salary_report(){
        $emp=AllEmployeeEmp::get();
        return view('allemp_salary',compact('emp'));
    }
    public function emp_pf_detail(){
        return view('pf');
    }

    public function SalarySlip($id,$date){
        $month = date("m",strtotime($date));
        $year = date("Y",strtotime($date));
        $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
        $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
        $total_days=date("d",strtotime($lastDate));
        $emp=AllEmployeeEmp::where('id',$id)->first();
        $department_emp=Department::where('id',$emp->department)->first();
        $designation_emp=Designation::where('id',$emp->designation)->first();
        $attendance=Attendance::where("emp_id",$emp->id)->where('date','>=',$firstDate)->where('date','<=',$lastDate)->get();
        $total_salary=0;
        $total_working_days=0;
        foreach($attendance as $at){
         $salary_tbl=SalaryDistribution::where("site_name",$at->site_id)->where("designation",$at->designation_id)->first();
         if($at->attendance_status==1){
            $one_daye_salary=$salary_tbl->salary_amount/$total_days;
            $total_salary+=$one_daye_salary;
            $total_working_days++;
         }
        }
        return view('salary-slip',compact('total_salary','emp','department_emp','designation_emp','month','total_working_days'));
    }

}
