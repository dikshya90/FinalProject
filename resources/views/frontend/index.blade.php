@extends('layouts.front')
@section('title', 'ArtsyWish')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('message') !!}</strong>
        </div>
    @endif
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('frontend/images/main_paint.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">We Promote creative arts &amp; Paintings</h1>
                        <h4 class="mb-4" style="color: wheat;">We deliver best arts &amp; Paintings</h4>
                        <a href="{{url('/apply')}}" class="btn btn-primary py-3 px-4">Apply as an Artist</a>
                        <!-- <p><a href="#" class="btn btn-primary">View Details</a></p> -->
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{asset('frontend/images/main_paint_2.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-sm-12 ftco-animate text-center">
                        <h1 class="mb-2">Creative Paintings &amp; Arts</h1>
                        <h4 class="mb-4" style="color: wheat;">We deliver best arts &amp; Paintings</h4>
                        <a href="{{url('/apply')}}" class="btn btn-primary py-3 px-4">Apply as an Artist</a>
                        <!-- <p><a href="#" class="btn btn-primary">View Details</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	<!-- features box -->
<section class="ftco-section">
	<div class="container justify-content-center">
		<div class="row no-gutters ftco-services justify-content-center">
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Free Shipping</h3>
                        <span>We deliver Paintings in free.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Superior Quality</h3>
                        <span>Quality Products</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Support</h3>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- category and product box -->
{{-- category display section --}}
<section class="ftco-section ftco-category ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<!-- <span class="subheading">Featured Products</span> -->
				<h3 class="mb-4">Categories</h3>
				<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
			</div>
			<div class="col-md-10 mb-5 text-center">
                @if ($category->count()>0)
                    @php($count = 1)
                        <ul class="product-category">
                            <li><a href="#" class="active">All Categories</a></li>
                                @foreach ($category as $cat)
                                    <li><a href="{{url('/categoryListing/'.$cat->id)}}">{{$cat->name}}</a></li>
                                        @php($count++)
                                @endforeach
                        </ul>
                @else
                        <ul class="product-category">
                            <li class="active">No Categories</li>
                        </ul>
                @endif
			</div>
        </div>

        {{-- featured painting display section --}}
        <div class="row">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<!-- <span class="subheading">Featured Products</span> -->
				<h3 class="mb-4">Featured Paintings</h3>
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
            </div>

            @foreach ($allFeatPaintings as $painting)
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
									{{-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
                                    </a> --}}
                                    <form action="{{url('/addToCart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="painting_id" value="{{ $painting->id }}">
                                        <input type="hidden" name="name" value="{{ $painting->name }}">
                                        <input type="hidden" name="description" value="{{ $painting->description }}">
                                        <input type="hidden" name="size" value="{{ $painting->size }}">
                                        <input type="hidden" name="price" id="price" value="{{ $painting->price }}">
                                        {{-- <input type="hidden" name="image" id="image" value="{{ $painting->image }}"> --}}
                                        <input type="hidden" name="weight" id="price" value="{{ $painting->weight }}">
                                    {{-- <a href="{{url('/addToCart')}}" class="buy-now d-flex justify-content-center align-items-center mx-1"> --}}
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

        {{-- all painting display section --}}
        <div class="row">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<!-- <span class="subheading">Featured Products</span> -->
				<h3 class="mb-4">Our Paintings</h3>
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
            </div>
            @foreach ($allPaintings as $painting)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{url('/single/'.$painting->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('/admin/images/paintings/'.$painting->image)}}" alt="Colorlib Template" style="height:260px; width:380px;">
                            {{-- <span class="status">30%</span> --}}
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
                                    {{-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a> --}}
                                    <form action="{{url('/addToCart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="painting_id" value="{{ $painting->id }}">
                                        <input type="hidden" name="name" value="{{ $painting->name }}">
                                        <input type="hidden" name="description" value="{{ $painting->description }}">
                                        <input type="hidden" name="size" value="{{ $painting->size }}">
                                        <input type="hidden" name="price" id="price" value="{{ $painting->price }}">
                                        {{-- <input type="hidden" name="image" id="image" value="{{ $painting->image }}"> --}}
                                        <input type="hidden" name="weight" id="price" value="{{ $painting->weight }}">
                                    {{-- <a href="{{url('/addToCart')}}" class="buy-now d-flex justify-content-center align-items-center mx-1"> --}}
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

	</div>
</section>

<section class="ftco-section img" style="background-image: url({{asset('frontend/images/sub5.jpg')}});">
    <div class="container">
		<div class="row justify-content-start">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                {{-- <span class="subheading">Best {{$offer->offerComponent()->offerComponents}} Offer For You</span> --}}
                <span class="subheading">
                @foreach ($offerCom as $off)
                    @if ($off->id == $offer->offer_com_id )
                        Best {{$off->offerComponents}} For You.
                    @endif
                @endforeach
            </span>
                    <h2 class="mb-4">{{$offer->title}}</h2>
                    <p>{{$offer->description}}</p>
                    <h3>Starts: {{$offer->start_date}}</h3>
                    <h3>Ends: {{$offer->end_date}}</h3>
                    {{-- <span class="price">$10 <a href="#">now $5 only</a></span> --}}
            </div>
        </div>
    </div>
</section>


@endsection
