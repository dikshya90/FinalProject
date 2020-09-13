@extends('layouts.admin')

@section('title', 'Paintings')
@section('page-title', 'Painting List')

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
                        View Paintings
                    </h3>
                    @can('user-add')
                        <a href="{{route('painting.create')}}" class="btn btn-success pull-right">Add New</a>
                    @endcan
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Category</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Price</th>
                                <th style="text-align: center;">Size</th>
                                <th style="text-align: center;">Weight</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Painted in Year</th>
                                <th style="text-align: center;">Featured</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($paintings->count()>0)
                                @php($count = 1)
                                    @foreach ($paintings as $painting)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$painting->name}}</td>

                                            {{-- @dd($painting->category_id) --}}
                                            @foreach ($categories as $category)
                                                @if ($category->id == $painting->category_id)
                                                    <td>{{$category->name}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$painting->description}}</td>
                                            <td>{{$painting->price}}</td>
                                            <td>{{$painting->size}}</td>
                                            <td>{{$painting->weight}}</td>
                                            <td>
                                                @if(!empty($painting->image))
                                                    <img src="{{ asset('admin/images/paintings/'.$painting->image) }}" style="width:50px;">
                                                @endif
                                            </td>
                                            <td>{{$painting->year}}</td>
                                            <td>{{$painting->featured}}</td>
                                            <td>{{$painting->status}}</td>
                                            {{-- for action like edit and delete --}}
                                            <td>
                                            @can('painting-edit')
                                                {{-- <a href="#" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a> --}}
                                                <a href="{{route('painting.edit',['id' => $painting->id])}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan

                                            {{-- deleting users from database --}}
                                            @can('painting-delete')
                                                <form action="{{route('painting.destroy',['id' => $painting->id])}}" method="POST">
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

