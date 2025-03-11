<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayRollController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\CommonController;


use Illuminate\Support\Facades\File;

Auth::routes();
//web
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('homepage');

//ReportsController
Route::get('/all/employee',[ReportsController::class,'all_employee'])->name('all_employee');
Route::get('/all/employee/list_section',[ReportsController::class,'allemploy_list_section'])->name('allemploy_list_section');
Route::get('/all/employee/attendance',[ReportsController::class,'all_employee_attendance'])->name('all_employee_attendance');
Route::get('/all/employee/salary_report',[ReportsController::class,'all_employee_salary_report'])->name('all_employee_salary_report');
Route::get('/all/site_name&salary',[ReportsController::class,'all_employee_sitename'])->name('all_employee_sitename');

//InformationController
Route::get('/my_profile',[InformationController::class,'my_profile'])->name('my_profile');
Route::get('/my_attendance',[InformationController::class,'my_attendance'])->name('my_attendance');
Route::get('/my_salary',[InformationController::class,'my_salary'])->name('my_salary');

//AttendanceController
Route::get('/all_employee_attendance',[AttendanceController::class,'all_attendance'])->name('all_attendance');
Route::get('/qrt_attendance',[AttendanceController::class,'qrt_attendance'])->name('qrt_attendance');
Route::get('/gaurd_attendance',[AttendanceController::class,'gaurd_attendance'])->name('gaurd_attendance');
Route::get('/management_attendance',[AttendanceController::class,'management_attendance'])->name('management_attendance');
Route::get('/officer_attendance',[AttendanceController::class,'officer_attendance'])->name('officer_attendance');
Route::get('/transfer',[AttendanceController::class,'transfer'])->name('transfer');

Route::get('/attendance/list/{id}',[AttendanceController::class,'AttendanceList'])->name('attendance_list');



//PayRollController
Route::get('/generate_salary',[PayRollController::class,'generate_salary'])->name('generate_salary');
Route::get('/emp_salary_report',[PayRollController::class,'emp_salary_report'])->name('emp_salary_report');
Route::get('/emp_pf_detail',[PayRollController::class,'emp_pf_detail'])->name('emp_pf_detail');
Route::get('/salary/slip/{id}/{date}',[PayRollController::class,'SalarySlip'])->name('salary_slip');
Route::get('/emp_salary_reports/{month}',[PayRollController::class,'SalaryGetMonthWise'])->name('salary_get_month_wise');

//Setting Controller
Route::get('/add_location',[SettingController::class,'add_location'])->name('add_location');
Route::post('/save_location',[SettingController::class,'save_location'])->name('save_location');


//route for DepartmentController DesignationController
Route::get('/roles_group',[SettingController::class,'roles_group'])->name('roles_group');
// Define the dynamic route in web.php
Route::post('/edit_group/{id}', [DepartmentController::class, 'edituserdata'])->name('edit_group');

Route::post('/rolegroup',[DepartmentController::class,'InsertData'])->name('rolesgroup');
Route::post('/designation',[DesignationController::class,'Insert'])->name('desingroup');

// routes/web.php
//Route::get('/data', [DesignationController::class, 'fetch_All'])name->('show_data');






Route::get('/salary_settings',[SettingController::class,'salary_settings'])->name('salary_settings');
Route::post('/salary_save',[SettingController::class,'salary_save'])->name('salary_save');
Route::post('/client_save',[SettingController::class,'client_save'])->name('client_save');
Route::get('/add_employee',[SettingController::class,'add_employee'])->name('add_employee');
Route::post('/save_employee',[SettingController::class,'SaveEmployee'])->name('save_employee');
Route::get('/all_client',[SettingController::class,'all_client'])->name('all_client');
Route::get('/contact',[SettingController::class,'contact'])->name('contact');
Route::get('/get-sites/{area}', [SettingController::class, 'getSites']);




// code with sanchit Use CommonController
Route::post('/get_designation',[CommonController::class,'GetDesignation'])->name('get_designation');

Route::post('/present_absent',[CommonController::class,'PresentAbsent'])->name('present_absent');


