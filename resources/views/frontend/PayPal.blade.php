@extends('layouts.front')
@section('title', 'Paypal')

@section('content')
<?php use App\Model\Customer\Order; ?>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="margin-top: 5%;">
        <div class="container" style="margin-bottom: 10%; text-align: center;">
            <h3>YOUR ORDER HAS BEEN PLACED! THANK YOU!!</h3>
            <p>Your order number is {{ Session::get('order_id') }} and total payable about is $ {{ Session::get('total_amount') }}</p>
            <p>Please make payment by clicking on below Payment Button</p>

            <?php
                $order_details = Order::getOrderDetails(Session::get('order_id'));
                $order_details = json_decode(json_encode($order_details));

                $array_name = explode(' ',$order_details->name);
            ?>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="dikshyagh123@gmail.com">
                    <input type="hidden" name="item_name" value="{{ Session::get('order_id') }}">
                    {{-- <input type="hidden" name="currency_code" value="INR"> --}}
                    <input type="hidden" name="total_amount" value="{{ Session::get('total_amount') }}">
                    <input type="hidden" name="name" value="{{ $array_name[0] }}">
                    <input type="hidden" name="country" value="{{ $order_details->country }}">
                    <input type="hidden" name="city" value="{{ $order_details->city }}">
                    <input type="hidden" name="street" value="{{ $order_details->street }}">
                    <input type="hidden" name="postcode" value="{{ $order_details->postcode }}">
                    <input type="hidden" name="email" value="{{ $order_details->customer_email }}">
                    {{-- <input type="hidden" name="country" value="{{ $getCountryCode->country_code }}"> --}}
                    <input type="hidden" name="return" value="{{ url('paypal/thanks') }}">
                    <input type="hidden" name="cancel_return" value="{{ url('paypal/cancel') }}">
                    <input type="image"
                        src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Pay Now">
                        <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif"
                        width="1" height="1">
                </form>
        </div>
</section>

@endsection


<?php
Session::forget('total_amount');
Session::forget('order_id');
?>
