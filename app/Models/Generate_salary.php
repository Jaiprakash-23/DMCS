<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generate_salary extends Model
{
    use HasFactory;

    protected $table = 'generate_salary';
    public $timestamps = false;

    protected $fillable = ['emp_id','salary_month','net_pay'];
    
}
