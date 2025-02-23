<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllEmpAttendance extends Model
{
    use HasFactory;
    protected $table="attendance_officer";
    protected $fillable=['fullname','employee_id', 'attendance_status', 'date'];
}
