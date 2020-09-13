
@extends('layouts.front')
@section('title', 'Single Painting')

@section('content')
    <section class="ftco-section">
        <div class="container">
            @if(Session::has('message'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>{!! session('message') !!}</strong>
		            </div>
		        @endif
            <div class="row">

                <div class="col-lg-6 mb-5 ftco-animate">
                    <img src="{{asset('/admin/images/paintings/'.$paintingDetail->image)}}" class="img-fluid" style="height:550px; width:700px;" alt="Colorlib Template">
                </div>

                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <form action="{{url('/addToCart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="painting_id" value="{{ $paintingDetail->id }}">
                        <input type="hidden" name="name" value="{{ $paintingDetail->name }}">
                        <input type="hidden" name="description" value="{{ $paintingDetail->description }}">
                        <input type="hidden" name="size" value="{{ $paintingDetail->size }}">
                        <input type="hidden" name="price" id="price" value="{{ $paintingDetail->price }}">
                        <input type="hidden" name="weight" id="price" value="{{ $paintingDetail->weight }}">

                        <h3>{{$paintingDetail->name}}</h3>

                        <p class="price"><span>Price: $ {{$paintingDetail->price}}</span></p>
                        <p>{{$paintingDetail->description}}</p>
                        <h5>Painted In:  {{$paintingDetail->year}}<h5>

                        <h5>Size:  {{$paintingDetail->size}}</h5>
                        <h5>Weight:  {{$paintingDetail->weight}}</h5>
                        <h5>Quantity:</h5>
                        <div class="row mt-4">
                            <div class="w-100"></div>
                            <div class="input-group col-md-4 d-flex mb-3">
                                <input type="number" id="quantity" disabled name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                <input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                            </div>
                            <div class="w-100"></div>
                        </div>
                        <button type="submit" class="btn btn-fefault cart" id="cartButton" style="color: forestgreen;;">
                            <span><i class="ion-ios-cart"></i></span>Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Paintings</span>
                    <h2 class="mb-4">Recommendation</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($relatedPainting as $related)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{url('/single/'.$related->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('/admin/images/paintings/'.$related->image)}}" style="height:300px; width:350px;" alt="Colorlib Template">
                                <!-- <span class="status">30%</span> -->
                                <!-- <div class="overlay"></div> -->
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{$related->name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="price-sale">${{$related->price}}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                    {{-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a> --}}
                                    <form action="{{url('/addToCart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="painting_id" value="{{ $related->id }}">
                                        <input type="hidden" name="name" value="{{ $related->name }}">
                                        <input type="hidden" name="description" value="{{ $related->description }}">
                                        <input type="hidden" name="size" value="{{ $related->size }}">
                                        <input type="hidden" name="price" id="price" value="{{ $related->price }}">
                                        {{-- <input type="hidden" name="image" id="image" value="{{ $related->image }}"> --}}
                                        <input type="hidden" name="weight" id="price" value="{{ $related->weight }}">
                                    {{-- <a href="{{url('/addToCart')}}" class="buy-now d-flex justify-content-center align-items-center mx-1"> --}}
                                        <input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                                        <button type="submit" class="btn btn-fefault cart" id="cartButton" style="color:forestgreen;">
                                            <span><i class="ion-ios-cart"></i></span>
                                            Add to cart
                                        </button>
                                    {{-- </a> --}}
                                    </form>

                                </div>
                                    <!-- <div class="m-auto d-flex">
                                        <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

