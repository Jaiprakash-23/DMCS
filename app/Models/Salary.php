<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id', 'salary_month', 'net_pay', 'wages', 'basic', 
        'hra', 'gross', 'pf', 'esi', 'advance', 'uniform', 'fine'
    ];

    public function employee()
    {
        return $this->belongsTo(AllEmployeeEmp::class, 'emp_id');
    }
}
