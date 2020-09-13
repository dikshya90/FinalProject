@extends('layouts.admin')

@section('title', 'View Users')
@section('page-title', 'View User Details')

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
                        View Users
                    </h3>
                    @can('user-add')
                        <a href="{{route('user.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Phone</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Role</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count()>0)
                                @php($count = 1)
                                    @foreach ($users as $user)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            {{-- @dd($user->role_id) --}}
                                            @foreach ($roles as $role)
                                                @if ($role->id == $user->role_id)
                                                    <td>{{$role->role}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$user->email}}</td>
                                            {{-- for action like edit and delete --}}
                                            <td>
                                            @can('user-edit')
                                            {{-- @if ()

                                            @endif --}}
                                                <a href="{{route('user.edit',['id' => $user->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan

                                            {{-- deleting users from database --}}
                                            @can('user-delete')
                                                <form action="{{route('user.destroy',['id' => $user->id])}}" method="POST">
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

