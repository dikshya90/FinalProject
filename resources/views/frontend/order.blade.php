@extends('layouts.front')
@section('title', 'Order Paintings')

@section('content')

<div class="container" style="margin-top: 5%;">
    <h3>Order-Review</h3>
    <div class="row justify-content-center" style="margin-bottom: 8%;">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Country</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Postcode</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$detailOfShipping->name}}</td>
                    <td>{{$detailOfShipping->customer_email}}</td>
                    <td>{{$detailOfShipping->phone}}</td>
                    <td>{{$detailOfShipping->country}}</td>
                    <td>{{$detailOfShipping->street}}</td>
                    <td>{{$detailOfShipping->city}}</td>
                    <td>{{$detailOfShipping->postcode}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <section class="ftco-section ftco-cart"> --}}
    <div class="container">
        @if($userCart->count()>0)
            @php($count = 1)
            @if(Session::has('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('message') !!}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Painting Image</th>
                                    <th>Name and Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <?php $total_amount = 0; ?>
                                @foreach ($userCart as $items)
                                    <tbody>
                                        <?php
                                            $image_cart=DB::table('paintings')->select('image')->where('id',$items->painting_id)->get();
                                        ?>
                                        <tr class="text-center">
                                            <td class="image">
                                                @foreach($image_cart as $imageCart)
                                                    <a href=""><img src="{{asset('/admin/images/paintings/'.$imageCart->image)}}" alt="" style="width: 100px;"></a>
                                                @endforeach
                                            </td>
                                            <td class="product-name">
                                            <h3>{{$items->name}}</h3>
                                            <p>{{$items->description}}</p>
                                            </td>

                                            <td class="price">${{$items->price}}</td>

                                            <td class="quantity"> {{$items->quantity}}</td>

                                            <td class="total">${{ $items->price*$items->quantity }}</td>
                                            <td class="product-remove"><a href="{{url('/cart/deleteCartItem/'.$items->id)}}"><span class="ion-ios-close"></span></a></td>
                                        </tr><!-- END TR-->
                                    </tbody>

                                    <?php $total_amount = $total_amount + ($items->price*$items->quantity); ?>

                                @endforeach
                        </table>
                    </div>
                </div>
            </div>

        <form action="{{url('/place_order')}}" method="POST">
                @csrf
                <input type="hidden" name="total_amount" value="{{ $total_amount }}">
            <div class="row justify-content-center mb-3">
                <div class="col-md-6 mb-5">
                    <div class="row mt-5">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="payment_method" id="COD" value="COD" class="mr-2"> Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="payment_method" id="Paypal" value="Paypal" class="mr-2"> Paypal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        {{-- <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="cart-total mt-5 pt-4">
                        <h3>Cart Totals</h3>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>$<?php echo $total_amount; ?></span>
                        </p>
                    </div>
                    {{-- <p><a href="#" class="btn btn-primary py-3 px-4">Place your Order</a></p> --}}
                    <button type="submit" class="btn btn-primary" onclick="return selectPaymentMethod();">Place your Order</button>

                    @php($count++)

                        @else
                            <h5 class="text-center">There's no items in this cart. Please add items to cart to continue shopping.</h5>
                        @endif
                </div>

            </div>
        </form>
    </div>

@endsection
