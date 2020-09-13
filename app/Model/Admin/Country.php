<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['country_code','country_name'];
}
