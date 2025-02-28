<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Department;
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
}
