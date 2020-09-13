<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login(){

        return view('auth.back');

    }

    public function logout(){
        Session::flush();
        return redirect('/back')->with('message', 'Logged out successfully.');
    }

}
