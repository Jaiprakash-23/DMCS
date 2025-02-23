<?php

namespace App\Http\Controllers;

use App\Models\AllEmpAttendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    
    public function qrt_attendance(){
        return view('attendance_qrt');
    }
    public function gaurd_attendance(){
        return view('attendance_guard');
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
}
