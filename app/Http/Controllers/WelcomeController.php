<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\location_site;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index(){
        $total_emp=AllEmployeeEmp::all()->count();
       $user = AllEmployeeEmp::where('role','!=',"admin")->count();
       $dayuser=AllEmployeeEmp::where('shift','day')->count();
       $nightuser=AllEmployeeEmp::where('shift','night')->count();
       $site = location_site::all()->count();
       $departmentss=Department::all()->count();
       
       // day user
        $today = Carbon::today()->toDateString();
        $presentToday = Attendance::where('date', $today)
        ->where('shift', 'day')
        ->where('attendance_status', '1')
        ->count();
         $absentToday = $dayuser - $presentToday;

         //night user
         $presentnight = Attendance::where('date', $today)
        ->where('shift', 'night')
        ->where('attendance_status', '1')
        ->count();
         $absentnight = $nightuser - $presentToday;
           
        return view('index',compact('total_emp','user','site','dayuser','nightuser','departmentss','presentToday','absentToday','presentnight','absentnight'));
    }
}
