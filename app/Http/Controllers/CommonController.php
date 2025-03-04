<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\AllEmployeeEmp;
use App\Models\SalaryDistribution;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function GetDesignation(Request $request){
        $responce=array();
          $data=Designation::where("dept_id",$request->department_id)->get();
          $department=Department::where("id",$request->department_id)->first();
          $report_data=Department::where("id",$department->report_id)->first();
          $responce['designation']=$data;
          $responce['report_data']=$report_data;
          return response()->json($responce);
    }

    public function PresentAbsent(Request $request){
        $responce=array();
             $emp_id=$request->emp_id;
             $date=$request->date;
             $status_id=$request->status_id;
             $emp=AllEmployeeEmp::where("id",$emp_id)->first();
             $check_attendance=Attendance::where("emp_id",$emp_id)->where("date",date("Y-m-d",strtotime($date)))->first();
          if(empty($check_attendance)){
            $insert_check=Attendance::create([
                       "emp_id"=>$emp_id,
                       "site_id"=> $emp->site,
                       "designation_id"=>$emp->designation,
                       "attendance_status"=>$status_id,
                       "date"=>date("Y-m-d",strtotime($date)),
                       "created_at"=>$date,
            ]);
            if($insert_check){
                $responce['status']="1";
                $responce['status_id']=$status_id;
                $responce['msg']="Date Insert Successfully";
            }else{
                $responce['status']="0";
                $responce['status_id']=$status_id;
                $responce['msg']="some error";
            }
          }else{
            $responce['status']="0";
            $responce['status_id']=$status_id;
            $responce['msg']="Today Already Attendance Approved";
          }
          return response()->json($responce);
    }

    public function getSalary($id,$date){
        $month = date("m",strtotime($date));
        $year = date("Y",strtotime($date));
        $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
        $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
        $total_days=date("d",strtotime($lastDate));
        $emp=AllEmployeeEmp::where('id',$id)->first();
        $attendance=Attendance::where("emp_id",$emp->id)->where('date','>=',$firstDate)->where('date','<=',$lastDate)->get();
        $total_salary=0;
        foreach($attendance as $at){
         $salary_tbl=SalaryDistribution::where("site_name",$at->site_id)->where("designation",$at->designation_id)->first();
         if($at->attendance_status==1){
            $one_daye_salary=$salary_tbl->salary_amount/$total_days;
            $total_salary+=$one_daye_salary;
         }
        }
       return $total_salary;
    }
}
