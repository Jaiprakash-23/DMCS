<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AllEmployeeEmp extends Authenticatable
{
    use HasFactory;
    protected $table="emp";
    protected $fillable = [
       
        'emp_id', 'user_id', 'fullname', 'department', 'designation', 'site', 'email', 
        'phone', 'profile_image', 'date_of_joining', 'reports_to', 'date_of_birth',
        'gender', 'shift', 'address', 'aadhaar_no', 'voter_id', 'nationality', 'religion',
        'marital_status', 'identity_mark', 'blood_group', 'height_weight', 'colour_of_skin',
        'emergency_name', 'emergency_relationship', 'emergency_phone',
        'emergency_name1', 'emergency_relationship1', 'emergency_phone1',
        'bank_name', 'bank_account_no', 'bank_ifsc', 'pan_no', 'pf_account',
        'family_mem_name', 'family_mem_relationship', 'family_mem_phone', 'family_mem_address',
      
        'institution', 'degree', 'grade', 'starting_date', 'completion_date',
        'institution1', 'degree1', 'grade1', 'starting_date1', 'completion_date1',
        'institution2', 'degree2', 'grade2', 'starting_date2', 'completion_date2',
       
        'company_name', 'location', 'job_position', 'period_from', 'period_to',
        'company_name1', 'location1', 'job_position1', 'period_from1', 'period_to1',
        'company_name2', 'location2', 'job_position2', 'period_from2', 'period_to2',
        'status'
    ];
    protected $guarded = [];

}
