@extends('layouts.front')
@section('title', 'Checkout Items')

@section('content')
    <section class="ftco-section">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('message') !!}</strong>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="{{url('/submit_check')}}" method="POST" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="billing_name" name="billing_name" class="form-control font-weight-bolder" placeholder="" value="{{$customer_login->name}}" style="color: black;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" id="billing_phone" name="billing_phone" class="form-control font-weight-bolder" placeholder="" value="{{$customer_login->phone}}">
                                </div>

                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="shipping_country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="billing_country" id="billing_country" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country_name}}" {{$customer_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="w-100"></div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" id="billing_street" name="billing_street" class="form-control font-weight-bolder">
                                </div>

                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" id="billing_city" name="billing_city" class="form-control font-weight-bolder" placeholder="">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postcode / ZIP *</label>
                                    <input type="number" id="billing_postcode" name="billing_postcode" class="form-control font-weight-bolder" placeholder="">
                                </div>

                            </div>

                            {{-- <button type="submit" class="btn btn-primary">Place an Order</button> --}}
                        </div>
                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="copyAddress">
                            <label class="form-check-label" for="copyAddress">Shipping Address same as Billing Address</label>
                        </div> --}}
                        <h3 class="mb-4 billing-heading">Shipping Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="shipping_name" name="shipping_name" class="form-control font-weight-bolder" placeholder="" @if(!empty($detailShipping->name)) value="{{ $detailShipping->name }}" @endif style="color: black;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" id="shipping_phone" name="shipping_phone" class="form-control font-weight-bolder" placeholder="" @if(!empty($detailShipping->phone)) value="{{ $detailShipping->phone }}" @endif>
                                </div>

                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="shipping_country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="shipping_country" id="shipping_country" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country_name}}" {{$customer_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="w-100"></div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" id="shipping_street" name="shipping_street" class="form-control font-weight-bolder" @if(!empty($detailShipping->street)) value="{{ $detailShipping->street }}" @endif>
                                </div>

                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" id="shipping_city" name="shipping_city" class="form-control font-weight-bolder" placeholder="" @if(!empty($detailShipping->city)) value="{{ $detailShipping->city }}" @endif>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postcode / ZIP *</label>
                                    <input type="number" id="shipping_postcode" name="shipping_postcode" class="form-control font-weight-bolder" placeholder="" @if(!empty($detailShipping->postcode)) value="{{ $detailShipping->postcode }}" @endif>
                                </div>

                            </div>
                            {{-- <button type="submit" class="btn btn-primary">Place an Order</button> --}}
                        </div>

                    {{-- </form><!-- END --> --}}
                </div>

                {{-- payment method box --}}
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <table class="table-sm">
                                    <thead class="table-head" style="background-color: #82ae46; color:#fff;">
                                        <tr class="text-center">
                                            <th>Painting Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
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
                                                    <td class="image" style="width: 5%;">
                                                        @foreach($image_cart as $imageCart)
                                                            <a href=""><img src="{{asset('/admin/images/paintings/'.$imageCart->image)}}" alt="" style="width: 100px;"></a>
                                                        @endforeach
                                                    </td>
                                                    <td class="" style="width: 5%;">
                                                        <p>{{$items->name}}</p>
                                                    {{-- <p>{{$items->description}}</p> --}}
                                                    </td>

                                                    <td class="price" style="width: 5%;"><p>${{$items->price}}</p></td>

                                                    <td class="quantity" style="width: 5%;"> {{$items->quantity}}

                                                    </td>

                                                    <td class="product-remove" style="width: 5%;"><p><a href="{{url('/cart/deleteCartItem/'.$items->id)}}"><span class="ion-ios-close"></span></a></p></td>
                                                </tr><!-- END TR-->

                                                <?php $total_amount = $total_amount + ($items->price*$items->quantity); ?>
                                            </tbody>

                                        @endforeach
                                </table>
                                <div class="cart-total mb-3">
                                    <h3>Cart Items Total</h3>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>$<?php echo $total_amount; ?></span>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-primary">Place an Order</button>
                                {{-- <p><a href="{{url('/submit_check')}}"class="btn btn-primary py-3 px-4" style="margin-top: 5%;">Place an order</a></p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Place an Order</button> --}}

                </div>
            </form>
            </div>
        </div>
    </section> <!-- .section -->

@endsection

{{-- payment method box --}}
{{-- <div class="col-xl-5">
    <div class="row mt-5 pt-3">
        <div class="col-md-12">
            <div class="cart-detail p-3 p-md-4">
                <h3 class="billing-heading mb-4">Payment Method</h3>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="radio">
                            <label><input type="radio" name="optradio" class="mr-2"> Cash On Delivery</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="radio">
                            <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                        </div>
                    </div>
                </div>
                <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
            </div>
        </div>
    </div>
</div> --}}

{{-- ends payment method box --}}

