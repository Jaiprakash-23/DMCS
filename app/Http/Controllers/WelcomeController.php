<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use App\Models\location_site;


class WelcomeController extends Controller
{
    public function index(){
       $user = AllEmployeeEmp::where('role','!=',"admin")->count();
       $dayuser=AllEmployeeEmp::where('shift','day')->count();
       $nightuser=AllEmployeeEmp::where('shift','night')->count();
       $site = location_site::all()->count();
        return view('index',compact('user','site','dayuser','nightuser'));
    }
}
