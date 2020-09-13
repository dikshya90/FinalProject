<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Shipping_Address extends Model
{
    protected $table = 'shipping_addresses';

    protected $fillable = [

        'name','customer_id','customer_email','phone','country','city','street','postcode',

    ];
}
