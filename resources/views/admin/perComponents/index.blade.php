@extends('layouts.admin')

@section('title', 'Permission Components')
@section('page-title', 'Permission Component List')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                @if(Session::has('message'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                <strong>{!! session('message') !!}</strong>
		            </div>
		        @endif
                <div class="box-header">
                    <h3 class="box-title" style="font-weight: bold;">
                        View Permission Components
                    </h3>
                    @can('permission-add')
                        <a href="{{route('permission_component.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Permission Components</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($per_components->count()>0)
                                @php($count = 1)
                                    @foreach ($per_components as $components)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$components->permission_component}}</td>
                                            <td>
                                            @can('permission-edit')
                                                <a href="{{route('permission_component.edit',['id'=>$components->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan

                                            @can('permission-delete')
                                                <form action="{{route('permission_component.destroy',['id'=>$components->id])}}" method="POST">
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

