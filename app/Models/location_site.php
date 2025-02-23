<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location_site extends Model
{
    //
use HasFactory;
    protected $table="location_site";
    protected $fillable = ['site_name', 'contact_person', 'address', 'area', 'country', 'city', 'postal_code', 'email', 'phone', 'mobile','fax', 'website_url', 'no_of_guard'];
}
