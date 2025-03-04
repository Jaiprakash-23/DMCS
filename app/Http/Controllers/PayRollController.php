<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryDistribution;
use App\Models\Client_List;
use App\Models\AllEmployeeEmp;
use App\Models\location_site;

class PayRollController extends Controller
{
    public function generate_salary(){
        $emp=AllEmployeeEmp::get();
        return view('salary-genrate',compact('emp'));
    }
    public function emp_salary_report(){
        return view('allemp_salary');
    }
    public function emp_pf_detail(){
        return view('pf');
    }

    public function SalarySlip($id,$date){
    //    dd(date("Y-m-d",strtotime($date)));
        return view('salary-slip');
    }

}
