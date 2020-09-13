<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer\Customer;
use App\Model\Customer\Order;
use App\Model\Customer\Order_Painting;
use App\Model\Customer\Shipping_Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $customer_id = Auth::guard('customers')->user()->id;
            $customer_email = Auth::guard('customers')->user()->email;

            $shipping_details = Shipping_Address::where(['customer_email' => $customer_email])->first();

            $cusOrder = new Order;
            // @dd($cusOrder);
            $cusOrder->customer_id = $customer_id;
            $cusOrder->customer_email =$customer_email;
            $cusOrder->name = $shipping_details->name;
            $cusOrder->phone = $shipping_details->phone;
            $cusOrder->country = $shipping_details->country;
            $cusOrder->street = $shipping_details->street;
            $cusOrder->city = $shipping_details->city;
            $cusOrder->postcode = $shipping_details->postcode;
            $cusOrder->order_status = "New";
            $cusOrder->payment_method = $data['payment_method'];
            $cusOrder->total_amount = $data['total_amount'];
            $cusOrder->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cart_items = DB::table('cart')->where(['user_email' => $customer_email])->get();
            foreach($cart_items as $items){
                $paint_order = new Order_Painting;
                $paint_order->order_id = $order_id;
                $paint_order->customer_id = $customer_id;
                $paint_order->painting_id = $items->painting_id;
                $paint_order->name = $items->name;
                $paint_order->size = $items->size;
                $paint_order->weight = $items->weight;
                $paint_order->price = $items->price;
                $paint_order->quantity = $items->quantity;
                $paint_order->save();
            }

            Session::put('order_id', $order_id);
            Session::put('total_amount', $data['total_amount']);

            if($data['payment_method']=="COD"){

                $paintingDetail = Order::with('orders')->where('id', $order_id)->first();
                $paintingDetail = json_decode(json_encode($paintingDetail), true);

                $customerDetail = Customer::where('id', $customer_id)->first();
                $customerDetail = json_decode(json_encode($customerDetail),true);

                // for cash on delivery
                return redirect('/thanksForOrder');
            }
            else{
                // for paypal
                return redirect('/paypal');
            }

        }
    }

    // for tracking order
    public function trackOrder(){

        $customer_id = Auth::guard('customers')->user()->id;
        $myOrder = Order::with('orders')->where('customer_id',$customer_id)->orderBy('id', 'DESC')->get();
        return view('frontend.trackOrder')->with(['myOrder'=>$myOrder]);

    }

    // for tracking the detail of ordered product
    public function detailOfOrderPro($order_id){

        $customer_id = Auth::guard('customers')->user()->id;
        $myOrderDetails = Order::with('orders')->where('id', $order_id)->first();
        $myOrderDetails = json_decode(\json_encode($myOrderDetails));
        return view('frontend.detailOfOrder')->with(['myOrderDetails'=>$myOrderDetails]);

    }

    // thanks page for making payment through cash on delivery
    public function thanksPage(Request $request){

        $customer_email = Auth::guard('customers')->user()->email;
        DB::table('cart')->where('user_email', $customer_email)->delete();

        return view('frontend.thanks');
    }

    // for PayPal
    public function PayPal(){
        $customer_email = Auth::guard('customers')->user()->email;
        DB::table('cart')->where('user_email', $customer_email)->delete();

        return view('frontend.PayPal');
    }

}
