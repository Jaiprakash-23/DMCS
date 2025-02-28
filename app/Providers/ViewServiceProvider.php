<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Department;
use App\Models\Designation;
use App\Models\location_site;
use App\Models\AllEmployeeEmp;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       $department= Department::get();
       $designation= Designation::get();
       $location_site= location_site::get();
       $emp= AllEmployeeEmp::orderBy("id","desc")->first();
       if(!empty($emp)){
        $string = $emp->emp_id;
        $lastIdNumber = (int) preg_replace('/\D/', '', $string);  // Removes non-numeric characters
       }else{
        $lastIdNumber=0;
       }
       $newEmpId="EMP-00".$lastIdNumber+1;
       View::share('department',$department);
       View::share('designation',$designation);
       View::share('location_site',$location_site);
       View::share('new_emp_id',$newEmpId);
    }
}
