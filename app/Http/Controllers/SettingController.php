<?php

namespace App\Http\Controllers;
use App\Models\location_site;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;

class SettingController extends Controller
{
    public function add_location(){
        return view('add_location');
    }
    public function save_location(Request $request){
        $location=$request->all();
        location_site::create($location);
        return view('location_list');

    }
    public function roles_group(){
        $depart_name = department::get(); 
        //  dd( $depart_name);
        
        // return view('d_d',compact('depart'));
        $depart = Department::join('designation', 'designation.dept_id', '=', 'department.id')
             ->select('department.*','designation.designation as designation_name')
             ->get();
            //  dd($depart);
            return view('d_d',compact('depart','depart_name'));

    }
    
    public function salary_settings(){
        return view('salary-destribution');
    }
    public function add_employee(){
        return view('add_emply');
    }
    public function all_client(){
        return view('all_client');
    }
    public function contact(){
        return view('contact');
    }

}
