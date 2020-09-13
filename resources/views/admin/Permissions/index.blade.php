@extends('layouts.admin')

@section('title', 'Permissions Details')
@section('page-title', 'Permissions Details')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="font-weight: bold;">
                    View Permissions
                </h3>
                @can('permission-add')
                    <a href="{{route('permission.create')}}" class="btn btn-success pull-right">Add New</a>
                @endcan
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach ($per_components as $components)
                        <div class="col-md-4 col-sm-12">
                            <h4>{{$components->permission_component}}</h4>
                            <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Id</th>
                                        <th style="text-align: center;">Permissions</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($per_components->count()>0)
                                        @php($count = 1)
                                            @foreach ($permissions as $permission)
                                                @if ($components->id == $permission->per_com_id)
                                                    <tr class="col text-center">
                                                        <td>{{$count}}</td>
                                                        <td>{{$permission->permission}}</td>
                                                        {{-- @can('permission-action') --}}

                                                        <td class="action">
                                                        @can('permission-edit')
                                                            <a href="{{route('permission.edit',['id'=>$permission->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                                        @endcan

                                                        @can('permission-delete')
                                                            <form action="{{route('permission.destroy',['id'=>$permission->id])}}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                            </form>
                                                        @endcan
                                                        </td>
                                                        {{-- @endcan --}}
                                                    </tr>
                                                    @php($count++)
                                                @endif
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
