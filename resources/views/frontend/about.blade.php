@extends('layouts.front')

@section('title', 'About Us')

@section('content')

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="margin-top: 5%;">
        <div class="container" style="margin-bottom: 7%;">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('frontend/images/sub4.jpg')}});"></div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">Welcome to ArtsyWish, an eCommerce Art Gallery Website</h2>
                            <h4 style="font-family: Arial, Helvetica, sans-serif; color: mediumseagreen;">Buy Art.  Do Good.  Appreciate Art. Feel Good.</h4>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>Buying art with ArtsyWish is made to be simple and user-friendly. We conduct exhibitions based on themes,
                        and provide offers often to our valuable customers.</p>
                        <p>ArtsyWish digital online Art Gallery specialising in art specially paintings.
                            We provide information about the different exhibitions conducted by top Art galleries in world throughout the year.
                            This helps customers to find quality artworks under a specific theme.
                            We, ArtsyWish, only exhibits exclusive, limited edition artworks, shipped to your door,
                            which are designed and manufactured to the highest quality. Our objective is to provide every customer with an exceptional piece of art
                            that is ready to hang as soon as it is unpacked.</p>
                        <p><a href="{{url('/')}}" class="btn btn-primary">Shop now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
