@extends('layouts.admin')

@section('title', 'View Artist Requests')
@section('page-title', 'Artist Request List')

@section('content')
    <div class="row">
        @if(Session::has('message'))
		    <div class="alert alert-success alert-block text-center">
		        <button type="button" class="close" data-dismiss="alert">×</button>
		        <strong>{!! session('message') !!}</strong>
		    </div>
		@endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="font-weight: bold;">
                        View Artist Request List
                    </h3>
                    {{-- @can('category-add')
                        <a href="{{route('category.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan --}}
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Contact Info</th>
                                <th style="text-align: center;">Country</th>
                                <th style="text-align: center;">City</th>
                                <th style="text-align: center;">Street</th>
                                <th style="text-align: center;">Painting</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($artists->count()>0)
                                @php($count = 1)
                                    @foreach ($artists as $artist)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$artist->name}}</td>
                                            <td>{{$artist->email}}</td>
                                            <td>{{$artist->contact}}</td>
                                            <td>{{$artist->country}}</td>
                                            <td>{{$artist->city}}</td>
                                            <td>{{$artist->street}}</td>
                                            <td>
                                                @if(!empty($artist->image))
                                                    <img src="{{ asset('admin/images/paintings/'.$artist->image) }}" style="width:50px;">
                                                @endif
                                            </td>
                                            <td>


                                            @can('artist-delete')
                                                <form action="{{route('requestDelete',['id'=>$artist->id])}}" method="POST">
                                                    @csrf
                                                    @method('post')
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
                                    <th colspan="16" class="text-center">
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

