<?php

namespace App\Http\Controllers;
use App\Models\AllEmpAttendance;
use App\Models\AttendanceGuard;
use App\Models\Department;
use App\Models\AllEmployeeEmp;
use App\Models\Leaves;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = Auth::guard('web')->user();
        $emp_id = $data->emp_id;
        if($emp_id){
            // dd($emp_id);
        Leaves::create([
            "emp_id"=>$emp_id,
            "subject"=>$request->subject,
            "description"=>$request->discription,
        ]);
    }
        return back()->with('success', 'Leave apply successfully');
    }
}
