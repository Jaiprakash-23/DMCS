<?php

namespace App\Http\Controllers;
use App\Models\location_site;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryDistribution;
use App\Models\Client_List;


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
        $data=location_site::all();
        $designation_data=Designation::all();
        return view('salary-destribution',compact('data','designation_data'));
    }
    public function salary_save(Request $request){
        $data=$request->all();
        SalaryDistribution::create($data);
        return redirect()->back();
    }
    public function getSites($area)
    {
        $sites = location_site::where('area', $area)->get();

        return response()->json($sites);
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

    public function client_save(Request $request){
        $data=$request->all();
        Client_List::create($data);
        return redirect()->back();
    }

    public function SaveEmployee(Request $request){
        $request->validate([
                 "name"=>"required",
                 "department"=>"required",
                 "designation"=>"required",
                 "joining_date"=>"required",
                 "report_id"=>"required",

        ]);
        dd($request->all());

    }

}
