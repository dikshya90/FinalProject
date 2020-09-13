@extends('layouts.front')
@section('title', 'Coming Exhibition')

@section('content')
    <section class="ftco-section ftco-cart">
		<div class="container">
            @if($exhibition->count()>0)
                @php($count = 1)
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>Exhibition Title</th>
                                        <th>Conducted By</th>
                                        <th>Location</th>
                                        <th>Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                    @foreach ($exhibition as $futureExhibition)
                                        <tbody>
                                            <tr class="text-center">
                                                <td class="product-name">
                                                    <h3>{{$futureExhibition->title}}</h3>
                                                </td>
                                                <td class="price">{{$futureExhibition->conducted_by}}</td>
                                                <td class="quantity"> {{$futureExhibition->location}}</td>
                                                <td class="quantity"> {{$futureExhibition->type}}</td>
                                                <td class="quantity"> {{$futureExhibition->start_date}}</td>
                                                <td class="quantity"> {{$futureExhibition->end_date}}</td>

                                            </tr><!-- END TR-->
                                        </tbody>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                @php($count++)
            @else
                <h5 class="text-center">There's no ongoing exhibitions!</h5>
            @endif
		</div>
	</section>
@endsection

