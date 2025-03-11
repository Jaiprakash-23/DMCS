<?php

namespace App\Http\Controllers;

use App\Models\AllEmpAttendance;
use App\Models\AttendanceGuard;
use App\Models\Department;
use App\Models\AllEmployeeEmp;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //

    public function qrt_attendance(){
        return view('attendance_qrt');
    }
    public function gaurd_attendance(){
        $all_guard=AttendanceGuard::all();

        return view('attendance_guard',compact('all_guard'));
    }
    public function management_attendance(){
        return view('attendance_management');
    }
    public function officer_attendance(){
        return view('attendance_officer');
    }
    public function transfer(){
        return view('Emp_Transfer');
    }
    public function all_attendance(){
        $all_employee_attendance = AllEmpAttendance::with(['guards', 'officer', 'qrt', 'management'])->get();

        return view('all_employ-attendance', compact('all_employee_attendance'));
    }


    public function AttendanceList($id){
        if($id<1){
            $employee=AllEmployeeEmp::get();
            $department_name="All Employee";
        }else{
            $employee=AllEmployeeEmp::where("department",$id)->get();
            $department_name=Department::where("id",$id)->first()->department;
        }
        return view('attendance_list',compact('department_name','employee'));
    }

    public function MyAttendance(){
        return view('my-attendance');
    }
}
