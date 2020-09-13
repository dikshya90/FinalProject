<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'country', 'street', 'city', 'image',
    ];
}
