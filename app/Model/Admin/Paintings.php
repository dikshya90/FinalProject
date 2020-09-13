<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Paintings extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'price', 'size', 'weight', 'year', 'image', 'featured', 'status',
    ];


    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    // method to count the number of cart
    public static function cartCount(){

        if(Auth::guard('customers')->check())
        {
            $user_email = Auth::guard('customers')->user()->email;
            $cartCount = DB::table('cart')->where('user_email', $user_email)->sum('quantity');
        }
        else{
            $session_id = Session::get('session_id');
            $cartCount = DB::table('cart')->where('session_id',$session_id)->sum('quantity');
        }
        return $cartCount;
    }

}
