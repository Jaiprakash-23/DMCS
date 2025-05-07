<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpTransfer extends Model
{
    use HasFactory;

    protected $table = 'emp_transfer';
    public $timestamps = false;
    protected $fillable = [
        'emp_id',
        'emp_name',
        'site_from',
        'site_to',
        'report_to'
    ];
}
