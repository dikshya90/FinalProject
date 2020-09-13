@extends('layouts.admin')

@section('title', 'View Offers')
@section('page-title', 'View Offer Details')

@section('content')
    <div class="row">
        @if(Session::has('message'))
		    <div class="alert alert-success alert-block">
		        <button type="button" class="close" data-dismiss="alert">×</button>
		        <strong>{!! session('message') !!}</strong>
		    </div>
		@endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="font-weight: bold;">
                        View Offers
                    </h3>
                    @can('offer-add')
                        <a href="{{route('offers.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Offer Type</th>
                                <th style="text-align: center;">Start Date</th>
                                <th style="text-align: center;">End Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($offers->count()>0)
                                @php($count = 1)
                                    @foreach ($offers as $offer)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$offer->title}}</td>
                                            <td>{{$offer->description}}</td>

                                            @foreach ($offer_components as $components)
                                                @if ($components->id == $offer->offer_com_id)
                                                    <td>{{$components->offerComponents}}</td>
                                                @endif
                                            @endforeach

                                            <td>{{$offer->start_date}}</td>
                                            <td>{{$offer->end_date}}</td>

                                            {{-- for action like edit and delete --}}
                                            <td>
                                            @can('offer-edit')
                                            {{-- @if ()

                                            @endif --}}
                                                <a href="{{route('offers.edit',['id' => $offer->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan

                                            {{-- deleting users from database --}}
                                            @can('offer-delete')
                                                <form action="{{route('offers.destroy',['id' => $offer->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                </form>
                                            @endcan
                                            </td>
                                        </tr>
                                        @php($count++)
                                    @endforeach
                            @else
                                <tr>
                                    <th colspan="6" class="text-center">
                                        No entries in the table!
                                    </th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

