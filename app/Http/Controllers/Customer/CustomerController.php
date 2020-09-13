<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function loginPage(){

        return view('frontend.loginCustomer');

    }

    public function registerIndex(){
        return view('frontend.registerCustomer');
    }

    public function registerUser(Request $request){
        $input_data = $request->all();
        $customerCount = Customer::where('email', $input_data['email'])->count();

        if($customerCount>0){
            return redirect()->back()->with('message', 'Email already exists!');
        }else{
            $customer = new Customer;
            $customer->name = $input_data['name'];
            $customer->email = $input_data['email'];
            $customer->phone = $input_data['phone'];
            $customer->password = Hash::make($input_data['password']);
            $customer->save();

            // for email verification

            $email = $input_data['email'];

            $messageData = ['email'=>$input_data['email'],'name'=>$input_data['name'],'code' => base64_encode($input_data['email'])];
            // send email to confirm
            Mail::send('frontend.emails.confirmation', $messageData, function($message) use($email){
                $message->to($email)->subject('Confirm Your Account');
            });
            // redirect back to same page with message saying, confirm your email to activate
            return redirect()->back()->with('message', 'Please confirm your email to activate your account!');

            if(Auth::guard('customers')->attempt([
                'email'=>$input_data['email'],
                'password'=>$input_data['password']
                ])){
                    Session::put('frontSession', $input_data['email']);

                    if(!empty(Session::get('session_id'))){
                        $session_id = Session::get('session_id');

                        DB::table('cart')->where('session_id', $session_id)->update(['user_email' => $input_data['email']]);
                    }
                    return redirect('/cart');
                }
        }

        }

        public function confirmEmail($email){
            // encode the email
            $email = base64_decode($email);
            $customerCount = Customer::where('email', $email)->count();
            if($customerCount > 0){

                $customerInfo = Customer::where('email', $email)->first();
                // check if the user is activated or not
                if($customerInfo->status == 0){

                    Customer::where('email',$email)->update(['status'=>1]);

                    $messageData = ['email' => $email,'name'=>$customerInfo->name];
                    // send mail saying welcome to website after confirming email
                    Mail::send('frontend.emails.welcome', $messageData, function($message) use($email){
                        $message->to($email)->subject('Welcome to ArtsyWish website');
                    });

                    return redirect()->back()->with('message', 'Your Email is activated and now, you are our member!');

                }
                else{

                    return redirect()->back()->with('message','Your Email is activated and now, you are our member!');
                }
            }
            else{
                abort(404);
            }
        }

    public function login(Request $request){

        $input_data=$request->all();

        // if(Auth::)

        if(Auth::guard('customers')->attempt(['email'=>$input_data['email'], 'password' => $input_data['password']])){

            $customerStatus = Customer::where('email', $input_data['email'])->first();

            if($customerStatus->status == 0){
                return redirect()->back()->with('message', 'Your account is not activated yet! Please confirm your email to activate!');
            }

            Session::put('frontSession', $input_data['email']);

            if(!empty(Session::get('session_id'))){
                $session_id = Session::get('session_id');
                DB::table('cart')->where('session_id', $session_id)->update(['user_email' => $input_data['email']]);
            }
            return redirect('/cart');
        }else{
            return redirect()->back()->with('message', 'Username and Password did not match!');
        }

    }

    public function logoutCus(){

        Auth::guard('customers')->logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');

    }

}
