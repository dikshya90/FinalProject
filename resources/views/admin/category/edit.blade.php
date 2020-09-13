@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title" style="font-weight:bold;">Edit Category</h3>
            </div>
            <!--form start-->
            <form action="{{route('category.update', ['id' => $category->id])}}" method="post" role="form" class="">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Category</label>
                        <input type="text" name="name" id="permission_component" value="{{$category->name}}" class="form-control">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection
