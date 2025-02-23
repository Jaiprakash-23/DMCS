<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;

class DesignationController extends Controller
{
    public function Insert(Request $req)
    {
        // // dd($req->all());
        // $ins = new Designation;
        // $ins->designation = $req->designation;

        // $ins->save(); 

        $data=Designation::create($req->all()); //insert data query but both field name same 
    
        return redirect()->back();
    }
    public function fetch_All()
    {
       
    //     $designations = Designation::with('department')->get();

    //     // Data ko view me pass karein
    //     return view('d_d', compact('designations'));
     }

}
