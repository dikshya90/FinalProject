<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table='cart';

    protected $fillable = ['name', 'painting_id', 'description', 'price', 'size', 'weight', 'quantity', 'user_email', 'session_id'];
}
