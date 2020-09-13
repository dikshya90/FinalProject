@extends('layouts.admin')

@section('title', 'View Customers')
@section('page-title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if(Session::has('message'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>{!! session('message') !!}</strong>
		            </div>
		        @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="font-weight: bold;">
                        View Customers
                    </h3>
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Phone</th>
                                <th style="text-align: center;">Country</th>
                                <th style="text-align: center;">Street</th>
                                <th style="text-align: center;">City</th>
                                <th style="text-align: center;">Postal Code</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($customers->count()>0)
                                @php($count = 1)
                                    @foreach ($customers as $user)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->country}}</td>
                                            <td>{{$user->street}}</td>
                                            <td>{{$user->city}}</td>
                                            <td>{{$user->postalcode}}</td>
                                            {{-- for action like edit and delete --}}
                                            <td>
                                            {{-- deleting users from database --}}
                                            @can('user-delete')
                                                <form action="{{route('user.customerDelete',['id' => $user->id])}}" method="get">
                                                    @csrf
                                                    {{-- @method('get') --}}
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
                                    <th colspan="4" class="text-center">
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

