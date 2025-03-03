<?php

namespace App\Http\Controllers;
use App\Models\location_site;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryDistribution;
use App\Models\Client_List;
use App\Models\AllEmployeeEmp;


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
                 "location_site"=>"required",
                 "report_id"=>"required",

        ]);
        $emp= AllEmployeeEmp::orderBy("id","desc")->first();
       if(!empty($emp)){
        $string = $emp->emp_id;
        $lastIdNumber = (int) preg_replace('/\D/', '', $string);  // Removes non-numeric characters
       }else{
        $lastIdNumber=0;
       }
       $newEmpId="EMP-00".$lastIdNumber+1;
        AllEmployeeEmp::create([
                 "emp_id"=>$newEmpId,
                 "fullname"=> $request->name,
                 "department"=>$request->department,
                 "designation"=>$request->designation,
                 "site"=>$request->location_site,
                 "reports_to"=>$request->report_id,
                 "email"=>$request->email,
                 "phone"=>$request->contact,
                 "date_of_joining"=>$request->joining_date,
                 "date_of_birth"=>$request->dob,
                 "gender"=>$request->gender,
                 "address"=>$request->address,
                 "aadhaar_no"=>$request->aadhar_no,
                 "voter_id"=>$request->voter_id_no,
        ]);
        return redirect()->back()->with('success', 'Insert data successfully');


    }


}
