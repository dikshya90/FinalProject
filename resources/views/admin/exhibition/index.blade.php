@extends('layouts.admin')

@section('title', 'Exhibition Details')
@section('page-title', 'View Exhibition Details')

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
                        View Exhibition Details
                    </h3>
                    @can('category-add')
                        <a href="{{route('exhibition.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Title of Exhibition</th>
                                <th style="text-align: center;">Conducted By</th>
                                <th style="text-align: center;">Location</th>
                                <th style="text-align: center;">Type of Exhibition</th>
                                <th style="text-align: center;">Start Date</th>
                                <th style="text-align: center;">End Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($exhibitions->count()>0)
                                @php($count = 1)
                                    @foreach ($exhibitions as $exhibition)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$exhibition->title}}</td>
                                            <td>{{$exhibition->conducted_by}}</td>
                                            <td>{{$exhibition->location}}</td>
                                            <td>{{$exhibition->type}}</td>
                                            <td>{{$exhibition->start_date}}</td>
                                            <td>{{$exhibition->end_date}}</td>
                                            <td>
                                            @can('exhibition-edit')
                                                <a href="{{route('exhibition.edit',['id'=>$exhibition->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan

                                            @can('exhibition-delete')
                                                <form action="{{route('exhibition.destroy',['id'=>$exhibition->id])}}" method="POST">
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

