<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class SalaryDistribution extends Model
{

    use HasFactory;
    protected $table="salary_distribution";

    protected $fillable = ['area','site_name','designation','salary_amount' ];


}
