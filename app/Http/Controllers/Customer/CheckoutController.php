<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Paintings;
use App\Model\Customer\Customer;
use App\Model\Customer\Shipping_Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
     // checkout paintings page
    public function checkout(){

        $countries=DB::table('countries')->get();

        $customer_login = Customer::where('id', Auth::guard('customers')->id())->first();

        if(Auth::guard('customers')->check()){
            $user_email = Auth::guard('customers')->user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        }
        else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        }

        // $user_login=User::where('id',Auth::id())->first();

        return view('frontend.checkout')->with(['userCart' => $userCart])
                                        ->with(['countries' => $countries])
                                        ->with(['customer_login' => $customer_login]);


    }

    // proceed checkout
    public function proceedCheckout(Request $request){
        // @dd($request->shipping_name);
        $customer_id = Auth::guard('customers')->user()->id;
        // @dd($request->$customer_id);
        $customer_email = Auth::guard('customers')->user()->email;

        $countShipping = Shipping_Address::where('customer_id', $customer_id)->count();

        $detailShipping = array();

        // if($countShipping>0){

        //     $detailShipping = Shipping_Address::where('çustomer_id',$customer_id)->first();
        // }

        if($request->isMethod('post')){

            $input_data = $request->all();

            if( empty($input_data['shipping_name']) ||
                empty($input_data['shipping_phone']) ||
                empty($input_data['shipping_country']) ||
                empty($input_data['shipping_street']) ||
                empty($input_data['shipping_city']) ||
                empty($input_data['shipping_postcode']) ||
                empty($input_data['billing_name']) ||
                empty($input_data['billing_phone']) ||
                empty($input_data['billing_country']) ||
                empty($input_data['billing_street']) ||
                empty($input_data['billing_city']) ||
                empty($input_data['billing_postcode']) ){

                return redirect()->back()->with('message','Please fill all fields');

            }

            Customer::where('id',$customer_id)->update([
                'name'=>$input_data['shipping_name'],
                'phone' => $input_data['shipping_phone'],
                'country' => $input_data['shipping_country'],
                'street' => $input_data['shipping_street'],
                'city' => $input_data['shipping_city'],
                'postcode' => $input_data['shipping_postcode'],
            ]);

            if($countShipping>0){
                Shipping_Address::where('customer_id',$customer_id)->update([
                    'name' => $input_data['shipping_name'],
                    'phone' => $input_data['shipping_phone'],
                    'country' => $input_data['shipping_country'],
                    'street' => $input_data['shipping_street'],
                    'city' => $input_data['shipping_city'],
                    'postcode' => $input_data['shipping_postcode'],
                    ]);
            }
            else{
                $shipping = new Shipping_Address;
                $shipping->customer_id = $customer_id;
                $shipping->customer_email = $customer_email;
                $shipping->name = $input_data['shipping_name'];
                $shipping->phone = $input_data['shipping_phone'];
                $shipping->country = $input_data['shipping_country'];
                $shipping->street = $input_data['shipping_street'];
                $shipping->city = $input_data['shipping_city'];
                $shipping->postcode = $input_data['shipping_postcode'];
                $shipping->save();
            }

            return redirect('/order');
        }

        return redirect('/checkout')->with(['detailShipping'=>$detailShipping]);

    }

    public function order()
    {
        $customer_id = Auth::guard('customers')->user()->id;
        $user_email = Auth::guard('customers')->user()->email;

        $customerDetail = Customer::where('id', $customer_id)->first();
        $detailOfShipping = Shipping_Address::where('customer_id', $customer_id)->first();

        if(Auth::guard('customers')->check()){
            $user_email = Auth::guard('customers')->user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        }
        else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        }

        foreach($userCart as $key => $painting){
            $paintingDetails = Paintings::where('id', $painting->painting_id)->first();
            $userCart[$key]->image = $paintingDetails->image;
        }

        return view('frontend.order')->with(['userCart'=>$userCart])
                                        ->with(['customerDetail' => $customerDetail])
                                        ->with(['detailOfShipping' => $detailOfShipping]);
    }


}
