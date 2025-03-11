<?php

namespace App\Http\Controllers;
use App\Models\AllEmpAttendance;
use App\Models\AttendanceGuard;
use App\Models\Department;
use App\Models\AllEmployeeEmp;
use App\Models\Leaves;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function ApplyLeave(){
        return view('apply_leave');
    }

    public function ApplyLeaveSave(Request $request){
       $request->validate([
            "discription"=>"required",
            "subject"=>"required",
        ]);
        Leaves::create([
            "emp_id"=>1,
            "subject"=>$request->subject,
            "description"=>$request->discription,
        ]);
        return back()->with('success', 'Leave apply successfully');
    }
}
