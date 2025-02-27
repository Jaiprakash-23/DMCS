<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllEmpAttendance extends Model
{
    use HasFactory;
    protected $table="emp";

    public function guards()
    {
        return $this->hasOne(AttendanceGuard::class, 'emp_id', 'emp_id');
    }

    public function officer()
    {
        return $this->hasOne(AttendanceOfficer::class, 'emp_id', 'emp_id');
    }

    public function qrt()
    {
        return $this->hasOne(AttendanceQrt::class, 'emp_id', 'emp_id');
    }
    public function management()
    {
        return $this->hasOne(AttendanceManagement::class, 'emp_id', 'emp_id');
    }
}


