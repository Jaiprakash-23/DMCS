<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function InsertData(Request $req)
    {
        //dd($req->all());
        // $ins = new Department;
        // $ins->department = $req->department;

        // $ins->save(); 
    
        // return redirect()->back();
        $data=department::create($req->all()); //insert data query but both field name same 
    
        return redirect()->back();
    }
    // public function edituserdata($id) //show data in inputbox
    // {
    //   $emp_tbl = new Department();
    //   $user = $emp_tbl::where('id', $id)->first();
    //   return view('d_d', ['user' => $user]);
    // }

     
   
}
