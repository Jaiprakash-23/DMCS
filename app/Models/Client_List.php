<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_List extends Model
{
    //
    protected $table="client_list";
    protected $fillable=['first_name','last_name','username','email','password','phone','client_id','company_name'];
}
