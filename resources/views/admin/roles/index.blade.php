@extends('layouts.admin')

@section('title', 'Roles')
@section('page-title', 'Role List')

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
                        View Role
                    </h3>
                    @can('role-add')
                        <a href="{{route('role.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan

                </div>
                <div class="box-body">
                    <table id="datList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Role</th>
                                <th style="text-align: center;">Created At</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($roles->count()>0)
                                @foreach ($roles as $role)
                                    <tr class="col text-center">
                                        <td>{{$role->role}}</td>
                                        <td>{{$role->created_at->toFormattedDateString()}}</td>
                                        <td>
                                        @can('role-edit')
                                            <a href="{{route('role.edit',['id'=>$role->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                        @endcan

                                        @can('role-delete')
                                            <form action="{{route('role.destroy',['id'=>$role->id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
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

{{-- @extends('layouts.admin') --}}
