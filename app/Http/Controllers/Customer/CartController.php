<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Paintings;
use App\Model\Customer\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){

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

        return view('frontend.cart')->with(['userCart'=>$userCart]);

    }

    public function addToCart(Request $request){

        $data = $request->all();

        $data['user_email'] = Auth::guard('customers')->user()->email;

        $session_id = Session::get('session_id');
        if(!isset($session_id)){
            $session_id = str_random(40);
            Session::put('session_id', $session_id);
        }

        if(empty(Auth::guard('customers')->check())){
            $countPainting = DB::table('cart')->where([
                'painting_id' => $data['painting_id'],
                'name' => $data['name'],
                'size' => $data['size'],
                'session_id' => $session_id])->count();

            if($countPainting>0){
                return redirect()->back()->with('message','Painting already exist in Cart!');
            }

        }
        else{
            $countPainting = DB::table('cart')->where([
                'painting_id' => $data['painting_id'],
                'name' => $data['name'],
                'size' => $data['size'],
                'user_email' => $data['user_email']])->count();

            if($countPainting>0){
                return redirect()->back()->with('message', 'Painting Already exist in Cart!');
            }
        }

        DB::table('cart')->insert([
            'painting_id' => $data['painting_id'],
            'name'=>$data['name'],
            'description'=>$data['description'],
            'size' => $data['size'],
            'weight' => $data['weight'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'user_email' => $data['user_email'],
            'session_id' => $session_id]);

        return redirect('cart')->with('message', 'Painting has been added to cart!');
    }

    // delete paintings from cart
    public function deleteCart($id = null){

        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('message','Product has been deleted from Cart!');

    }


}
