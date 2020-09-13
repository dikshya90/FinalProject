@extends('layouts.admin')

@section('title', 'Create Painting')
@section('page-title', 'Create New Painting')

@section('content')
    <!--Permission Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Add Painting</h3>
        </div>
        <div class="box-body">
            <!--Form Start-->
            <form action="{{route('painting.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required = "">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category">
                        @foreach ($category as $catg)
                        {{-- @dd($component->permission_component) --}}
                            <option value="{{$catg->id}}">{{$catg->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="descrition" cols="30" rows="10" class="form-control"></textarea>
                    {{-- <input type="longtext" id="name" name="name" class="form-control"> --}}
                </div>

                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" id="price" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Size</label>
                    <input type="text" id="size" name="size" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Weight</label>
                    <input type="text" id="weight" name="weight" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Painted In Year</label>
                    <input type="date" id="year" name="year" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Feature Item</label>
                    <div class="control">
                        <input type="checkbox" name="featured" id="featured" value="1">
                    </div>
                </div>

                <div class="form-group">
                    <label>Display In Front</label>
                    <div class="controls">
                        <input type="checkbox" name="status" id="status" value="1">
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div><!--Permission Create Form Ends Here-->
@endsection
