<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Generate_salary;
use App\Models\location_site;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryDistribution;
use App\Models\Client_List;
use App\Models\AllEmployeeEmp;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{
    public function add_location($id = null)
    {
        if ($id != null) {
            $location = location_site::find($id); // Using find() instead of where()->first()

            if (!$location) {

                return redirect()->back()->with('error', 'Location not found');
            }

            return view('add_location', compact('location'));
        } else {
            return view('add_location', ['location' => null]);
        }

    }

    public function update_status(Request $request)
    {

        $emp_id = $request->emp_id;
        $today = Carbon::today()->toDateString();
        $date = Carbon::today()->format('Y-m-d');
        $status_id = $request->ststus;
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));
        $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
        $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
        $total_days = date("d", strtotime($lastDate));
        $emp = AllEmployeeEmp::where("id", $emp_id)->first();
        $salary_tbl = SalaryDistribution::where("site_name", $emp->site)->where("designation", $emp->designation)->first();
        $one_daye_salary = $salary_tbl->salary_amount / $total_days;
        $check_attendance = Attendance::where("emp_id", $emp_id)->where("date", $date)->first();
        if (empty($check_attendance)) {
            if ($status_id == 1) {
                $insert_check = Attendance::create([
                    "emp_id" => $emp_id,
                    "site_id" => $emp->site,
                    "punch_in" => $date,
                    "designation_id" => $emp->designation,
                    "attendance_status" => $status_id,
                    "date" => date("Y-m-d", strtotime($date)),
                    "created_at" => $date,
                ]);
                $todaysAttendance = Attendance::where('emp_id', $emp->id)
                    ->whereDate('created_at', $today)
                    ->first();

                if ($todaysAttendance->attendance_status == 1) {

                    $isGenerate = Generate_salary::where("emp_id", $emp->id)
                        ->whereYear("created", date('Y'))
                        ->whereMonth("created", date('m'))
                        ->first();
                    if ($isGenerate) {
                        $isGenerate->net_pay = $isGenerate->net_pay + $one_daye_salary;
                        $isGenerate->save();
                    } else {
                        Generate_salary::create([
                            "emp_id" => $emp->id,
                            "salary_month" => $salary_tbl->salary_amount,
                            "net_pay" => $one_daye_salary,
                        ]);
                    }
                }

            }
        } else {
            $todaysAttendance = Attendance::where('emp_id', $emp->id)
                ->whereDate('created_at', $today)
                ->first();
            if ($todaysAttendance->attendance_status == 1) {
                if ($status_id == 0){
                    $todaysAttendance->attendance_status = $status_id;
                    $todaysAttendance->save();
                    $isGenerate = Generate_salary::where("emp_id", $emp->id)
                        ->whereYear("created", date('Y'))
                        ->whereMonth("created", date('m'))
                        ->first();
                    if ($isGenerate) {
                        $isGenerate->net_pay = $isGenerate->net_pay - $one_daye_salary;
                        $isGenerate->save();
                    }
                }
            }

            if ($todaysAttendance->attendance_status == 0) {
                if ($status_id == 1){
                    $todaysAttendance->attendance_status = $status_id;
                    $todaysAttendance->save();
                    $isGenerate = Generate_salary::where("emp_id", $emp->id)
                        ->whereYear("created", date('Y'))
                        ->whereMonth("created", date('m'))
                        ->first();
                    if ($isGenerate) {
                        $isGenerate->net_pay = $isGenerate->net_pay + $one_daye_salary;
                        $isGenerate->save();
                    }
                }
            }
        }

        return redirect()->back()->with('message', 'Attendance status updated successfully');

    }
    public function save_location(Request $request)
    {
        // dd($request->post());
        if ($request->id != null) {
            $loc = location_site::where('id', $request->id)->first();
            $validatedData = $request->validate([
                'site_name' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'area' => 'nullable|string|max:255',
                'country' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal_code' => 'nullable|string|max:20|regex:/^[A-Za-z0-9\- ]+$/',
                'email' => 'required|email:rfc,dns|max:255',
                'phone' => 'nullable|string|max:20|regex:/^[\+0-9\-\(\)\s]+$/',
                'mobile' => 'required|string|max:20|regex:/^[\+0-9\-\(\)\s]+$/',
                'fax' => 'nullable|string|max:20|regex:/^[\+0-9\-\(\)\s]+$/',
                'website_url' => 'nullable|url|max:255|starts_with:http://,https://',
                'no_of_guard' => 'required|integer|min:0|max:10000',
            ]);
            $loc->site_name = $request->site_name;
            $loc->contact_person = $request->contact_person;
            $loc->address = $request->address;
            $loc->area = $request->area;
            $loc->country = $request->country;
            $loc->city = $request->city;
            $loc->postal_code = $request->postal_code;
            $loc->email = $request->email;
            $loc->phone = $request->phone;
            $loc->mobile = $request->mobile;
            $loc->fax = $request->fax;
            $loc->website_url = $request->website_url;
            $loc->no_of_guard = $request->no_of_guard;
            $loc->save();
            return redirect()->back()->with('message', 'location update successfully');
        } else {

            $location = $request->all();
            location_site::create($location);
            $locations = location_site::get();
            return view('location_list', compact('locations'));
        }

    }

    

    public function Get_location(Request $request)
    {
        $query = location_site::query();
        
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where('site_name', 'like', "%{$searchTerm}%");
        }
        $locations = $query->get();
        return view('location_list', compact('locations'));
    }



    public function delete_location($id)
    {
        $location = location_site::where('id', $id)->first();
        $location->delete();
        return redirect()->back()->with('message', 'site delete successfully');

    }

    public function view_location()
    {
        return view('view-location');
    }
    public function roles_group()
    {
        $depart_name = department::get();

        $depart = Department::join('designation', 'designation.dept_id', '=', 'department.id')
            ->select('department.*', 'designation.designation as designation_name')
            ->get();
        //  dd($depart);
        return view('d_d', compact('depart', 'depart_name'));

    }

    public function salary_settings()
    {
        $data = location_site::all();
        $designation_data = Designation::all();
        return view('salary-destribution', compact('data', 'designation_data'));
    }
    public function salary_save(Request $request)
    {
        $data = $request->all();
        SalaryDistribution::create($data);
        return redirect()->back();
    }
    public function getSites($area)
    {
        $sites = location_site::where('area', $area)->get();

        return response()->json($sites);
    }
    public function add_employee($id = null)
    {
        // dd($id);
        $employee = null;
    
        if ($id != null) {
            $employee = AllEmployeeEmp::find($id);
            if (!$employee) {
                return redirect()->back()->with('error', 'Employee not found');
            }
        }
    
        return view('add_emply', compact('employee'));

    }
    public function all_client()
    {
        return view('all_client');
    }
    public function contact()
    {
        return view('contact');
    }

    public function client_save(Request $request)
    {
        $data = $request->all();
        Client_List::create($data);
        return redirect()->back();
    }

    public function SaveEmployee(Request $request)
    {
      
        if ($request->id != null) {
           
            
            // dd($request->post());
            $emp = AllEmployeeEmp::where('id', $request->id)->first();
            
            if($request->image){
                $path = $request->image->store('images', 'public');
                
                $emp->profile_image = $path;
            }
            $emp->fullname = $request->name;
            $emp->department = $request->department;
            $emp->designation = $request->designation;
            $emp->site = $request->location_site;
            $emp->email = $request->email;
            $emp->phone = $request->contact;
            $emp->date_of_joining = $request->joining_date;
            $emp->reports_to = $request->report_id;
            $emp->date_of_birth = $request->dob;
            $emp->gender = $request->gender;
            $emp->shift = null;
            $emp->address = $request->address;
            $emp->aadhaar_no = $request->aadhar_no;
            $emp->voter_id = $request->voter_id_no;
            $emp->nationality = $request->nantionality;
            $emp->religion = $request->religion;
            $emp->marital_status = $request->marital_status;
            $emp->identity_mark = $request->identity_mark;
            $emp->blood_group = $request->blood_group;
            $emp->height_weight = $request->height_weight;
            $emp->colour_of_skin = $request->color_of_skin;
            $emp->emergency_name = $request->primary_name;
            $emp->emergency_relationship = $request->relationship;
            $emp->emergency_phone = $request->primary_contact;
            $emp->emergency_name1 = $request->secondary_name;
            $emp->emergency_relationship1 = $request->secondary_relationship;
            $emp->emergency_phone1 = $request->secondry_contact;
            $emp->bank_name = $request->bank_name;
            $emp->bank_account_no = $request->account_no;
            $emp->bank_ifsc = $request->ifcs_code;
            $emp->pan_no = $request->pan_no;
            $emp->pf_account = null;
            $emp->family_mem_name = $request->family_member_name;
            $emp->family_mem_relationship = $request->family_member_relation;
            $emp->family_mem_phone = $request->family_member_contact;
            $emp->family_mem_address = $request->family_member_address;
            $emp->institution = $request->institution;
            $emp->degree = $request->degree;
            $emp->grade = $request->grade;
            $emp->starting_date = $request->starting_date;
            $emp->completion_date = $request->completion_date;
            $emp->save();
            return redirect()->back()->with('success', 'Update data successfully');
        }

        $request->validate([
            "name" => "required",
            "department" => "required",
            "designation" => "required",
            "joining_date" => "required",
            "location_site" => "required",
            "report_id" => "required",

        ]);
        $emp = AllEmployeeEmp::orderBy("id", "desc")->first();
        if (!empty($emp)) {
            $string = $emp->emp_id;
            $lastIdNumber = (int) preg_replace('/\D/', '', $string);  // Removes non-numeric characters
        } else {
            $lastIdNumber = 0;
        }
        $newEmpId = "EMP-00" . $lastIdNumber + 1;
        //  dd($request->file('image'));
        if($request->image){
        $path = $request->image->store('images', 'public');
        }else{
            $path = null;
        }
        
        
        AllEmployeeEmp::create([
            "emp_id" => $newEmpId,
            "user_id" => null,
            "fullname" => $request->name,
            "department" => $request->department,
            "designation" => $request->designation,
            "site" => $request->location_site,
            "email" => $request->email,
            "phone" => $request->contact,
            "profile_image" => $path,
            "date_of_joining" => $request->joining_date,
            "reports_to" => $request->report_id,
            "date_of_birth" => $request->dob,
            "gender" => $request->gender,
            "shift" => null,
            "address" => $request->address,
            "aadhaar_no" => $request->aadhar_no,
            "voter_id" => $request->voter_id_no,
            "nationality" => $request->nantionality,
            "religion" => $request->religion,
            "marital_status" => $request->marital_status,
            "identity_mark" => $request->identity_mark,
            "blood_group" => $request->blood_group,
            "height_weight" => $request->height_weight,
            "colour_of_skin" => $request->color_of_skin,
            "emergency_name" => $request->primary_name,
            "emergency_relationship" => $request->relationship,
            "emergency_phone" => $request->primary_contact,
            "emergency_name1" => "asdfghjkl",
            "emergency_relationship1" => $request->secondary_relationship,
            "emergency_phone1" => $request->secondry_contact,
            "bank_name" => $request->bank_name,
            "bank_account_no" => $request->account_no,
            "bank_ifsc" => $request->ifcs_code,
            "pan_no" => $request->pan_no,
            "pf_account" => null,
            "family_mem_name" => $request->family_member_name,
            "family_mem_relationship" => $request->family_member_relation,
            "family_mem_phone" => $request->family_member_contact,
            "family_mem_address" => $request->family_member_address,
            "institution" => $request->institution,
            "degree" => $request->degree,
            "grade" => $request->grade,
            "starting_date" => $request->starting_date,
            "completion_date" => $request->completion_date,
            "institution1" => null,
            "degree1" => null,
            "grade1" => null,
            "starting_date1" => null,
            "completion_date1" => null,
            "institution2" => null,
            "degree2" => null,
            "grade2" => null,
            "starting_date2" => null,
            "completion_date2" => null,
            "company_name" => null,
            "location" => null,
            "job_position" => null,
            "period_from" => null,
            "period_to" => null,
            "company_name1" => null,
            "location1" => null,
            "job_position1" => null,
            "period_from1" => null,
            "period_to1" => null,
            "company_name2" => null,
            "location2" => null,
            "job_position2" => null,
            "period_from2" => null,
            "period_to2" => null,
            "status" => null,
        ]);
        return redirect()->back()->with('success', 'Insert data successfully');


    }


}
