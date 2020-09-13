<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = ['name','email', 'subject', 'message'];
}
