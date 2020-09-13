<?php

namespace App\Http\Controllers;

use App\Model\Customer\Cart;
use App\Model\Customer\Customer;
use App\Model\Customer\Order;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_customer = Customer::all()->count();
        $user = User::all()->count();
        $cart = Cart::all()->count();
        $total_order = Order::all()->count();
        $pending_order = Order::where('order_status','Pending')->count();
        $shipped_order = Order::where('order_status', 'Shipped')->count();
        return view('admin.dashboard')->with(['total_customer'=>$total_customer])
                                        ->with(['user'=> $user])
                                        ->with(['cart' => $cart])
                                        ->with(['total_order'=>$total_order])
                                        ->with(['pending_order' => $pending_order])
                                        ->with(['shipped_order' => $shipped_order]);
    }
}
