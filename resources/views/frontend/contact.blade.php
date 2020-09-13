@extends('layouts.front')
@section('title', 'Contact')

@section('content')
<section class="ftco-section contact-section bg-light">
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('message') !!}</strong>
            </div>
        @endif
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Address:</span> Lalitpur, Nepal</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Phone:</span> <a href="tel://1234567920">+977 9815161975</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@artsywish.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Website</span> <a href="#">info@artsywish.com</a></p>
                    </div>
                </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="{{route('contact.store')}}" class="bg-white p-5 contact-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group text-center text-bold" style="font-weight: bold; margin-bottom: 8%;">
                        YOUR ENQUIRIES
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>
@endsection
