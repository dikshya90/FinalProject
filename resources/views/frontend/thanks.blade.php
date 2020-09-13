@extends('layouts.front')
@section('title', 'Thankyou')

@section('content')

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="margin-top: 5%;">
        <div class="container" style="margin-bottom: 10%; text-align: center;">
            <h3>YOUR CASH ON DELIVERY ORDER HAS BEEN PLACED! THANK YOU!!</h3>
			<p>Your order number is {{ Session::get('order_id') }} and total payable about is $ {{ Session::get('total_amount') }}</p>
        </div>
    </section>

@endsection


<?php
    Session::forget('total_amount');
    Session::forget('order_id');
?>
