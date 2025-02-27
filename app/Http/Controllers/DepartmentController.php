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
    public function edituserdata(Request $request,$id) //show data in inputbox
    {
      $data=array('department'=>$request->department, 'created'=>date('Y-m-d H:i:s'));


      department::where('id',$id)->update($data);
      return redirect()->back()->with('success',"Successfully updated");
    }



}
