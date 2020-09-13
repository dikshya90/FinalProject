@extends('layouts.front')
@section('title', 'Apply')

@section('content')
<section class="ftco-section contact-section bg-light">
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success alert-block text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('message') !!}</strong>
            </div>
        @endif

        <div class="row block-9 justify-content-center">
            <div class="col-md-10 order-md-last d-flex">
                <form action="{{url('/applySubmit')}}" class="bg-white p-5 contact-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group text-center text-bold" style="font-weight: bold; margin-bottom: 8%;">
                        Fill requirements to become part of ArtsyWish
                    </div>

                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="string" name="phone" id="phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Country</label>
                        <select name="country" id="country" class="form-control">
                            @foreach ($countries as $country)
                                <option>{{$country->country_name}}</option>
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">City</label>
                        <input type="string" name="city" id="city" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Street</label>
                        <input type="string" name="street" id="street" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Your piece of work (Painting)</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="Apply" class="btn btn-primary py-3 px-5">Apply</button>
                        {{-- <input type="submit" value="Apply" class="btn btn-primary py-3 px-5"> --}}
                    </div>

                </form>

            </div>

            {{-- <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div> --}}
        </div>
    </div>
</section>
@endsection
