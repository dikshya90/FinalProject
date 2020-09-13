@extends('layouts.admin')

@section('title', 'Category')
@section('page-title', 'Add Category')

@section('content')
    <!--Permission Component Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="font-weight: bold;">Create Category</h3>
        </div>
        <!--form start-->
        <form action="{{route('category.store')}}" method="post" role="form" class="">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Cateogry</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection
