<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    //
    public function my_profile(){
        return view('my_profile');
    }
    public function my_attendance(){
        return view('my-attendance');
    }
    public function my_salary(){
return view('my-attendance');
    }
}
