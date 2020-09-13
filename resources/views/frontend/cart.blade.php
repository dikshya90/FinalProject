@extends('layouts.front')
@section('title', 'Carts')

@section('content')
    <section class="ftco-section ftco-cart">
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

                                                <td class="quantity"> {{$items->quantity}}
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100" disabled>
                                                    </div>
                                                </td>
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
                <div class="row justify-content-end">
                    <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Cart Totals</h3>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>$<?php echo $total_amount; ?></span>
                            </p>
                        </div>
                        <p><a href="{{url('/checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    </div>
                </div>

                @php($count++)

            @else
                <h5 class="text-center">There's no items in this cart. Please add items to cart to continue shopping.</h5>
                <div class="text-center">
                    <a href="{{url('/')}}" class="btn btn-primary">Continue Shopping</a>
                </div>
            @endif

		</div>
	</section>
@endsection

