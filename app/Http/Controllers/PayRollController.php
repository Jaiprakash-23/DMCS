<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayRollController extends Controller
{
    public function generate_salary(){
        return view('salary-genrate');
    }
    public function emp_salary_report(){
        return view('allemp_salary');
    }
    public function emp_pf_detail(){
        return view('pf');
    }

}
