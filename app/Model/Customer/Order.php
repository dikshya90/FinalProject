<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'customer_id', 'customer_email', 'name', 'phone', 'country', 'street', 'city', 'postcode', 'order_status', 'payment_method', 'total_amount',
    ];

    public function orders(){
        return $this->hasMany(Order_Painting::class, 'order_id');
    }

    public static function getOrderDetails($order_id){
        $getOrderDetails = Order::where('id',$order_id)->first();
        return $getOrderDetails;
    }

}
