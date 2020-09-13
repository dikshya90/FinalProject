@extends('layouts.front')
@section('title', 'Search Paintings')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-block text-center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('message') !!}</strong>
        </div>
    @endif
    {{-- searched painting display section --}}
    <div class="row mt-3 ml-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <h3 class="mb-4">Related Searched Paintings</h3>
        </div>

        @foreach ($searched_painting as $painting)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{url('/single/'.$painting->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('/admin/images/paintings/'.$painting->image)}}" alt="Colorlib Template" style="height:260px; width:380px;">
                        <span class="status">30%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{$painting->name}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="price-sale">${{$painting->price}}</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <form action="{{url('/addToCart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="painting_id" value="{{ $painting->id }}">
                                    <input type="hidden" name="name" value="{{ $painting->name }}">
                                    <input type="hidden" name="description" value="{{ $painting->description }}">
                                    <input type="hidden" name="size" value="{{ $painting->size }}">
                                    <input type="hidden" name="price" id="price" value="{{ $painting->price }}">
                                    <input type="hidden" name="weight" id="price" value="{{ $painting->weight }}">
                                    <input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                                    <button type="submit" class="btn btn-fefault cart" id="cartButton" style="color:forestgreen;">
                                        <span><i class="ion-ios-cart"></i></span>
                                        Add to cart
                                    </button>
                                {{-- </a> --}}
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
