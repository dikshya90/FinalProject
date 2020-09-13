<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Order_Painting extends Model
{
    protected $table = 'order_paintings';
    protected $fillable =[

        'order_id', 'customer_id', 'painting_id', 'name', 'size', 'weight', 'price', 'quantity',
    ];
}
