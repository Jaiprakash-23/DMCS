<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use App\Models\location_site;


class WelcomeController extends Controller
{  
    public function index(){
       $user = AllEmployeeEmp::all()->count();
       
       $site = location_site::all()->count();
        return view('index',compact('user','site'));
    }
}
