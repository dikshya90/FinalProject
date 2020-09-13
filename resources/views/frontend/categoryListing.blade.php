@extends('layouts.front')
@section('title', 'Painting Categories')

@section('content')

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="margin-top: 5%;">
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

        {{-- painting area --}}
        <div class="row">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<!-- <span class="subheading">Featured Products</span> -->
				<h3 class="mb-4">Paintings</h3>
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
            </div>

{{-- @dd(allPaintings) --}}
{{-- added for breadcrumb --}}

            @foreach ($categories->paintings as $painting)
{{-- @dd(allPaintings) --}}
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
									<p class="price"><span class="price-sale">$400</span></p>
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
                                        {{-- <input type="hidden" name="image" id="image" value="{{ $related->image }}"> --}}
                                        <input type="hidden" name="weight" id="price" value="{{ $painting->weight }}">
                                    {{-- <a href="{{url('/addToCart')}}" class="buy-now d-flex justify-content-center align-items-center mx-1"> --}}
                                        <input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                                        <button type="submit" class="btn btn-fefault cart" id="cartButton" style="color:forestgreen;">
                                            <span><i class="ion-ios-cart"></i></span>
                                            Add to cart
                                        </button>
                                    {{-- </a> --}}
                                    </form>
									{{-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</a>
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span>
									</a> --}}
								</div>
							</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

	</div>
</section>

@endsection
