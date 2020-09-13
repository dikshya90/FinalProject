@extends('layouts.admin')

@section('title', 'Painting Details')
@section('page-title', 'Edit Painting Details')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Paintings</h3>
    </div>
    <!--Box Body-->
    <div class="box-body">
        <!--Form Starts-->
    <form action="{{route('painting.update',['id'=>$paintings->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- for name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$paintings->name}}" class="form-control" required autocomplete="">
            </div>

            {{-- for category --}}
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="{{$paintings->category_id}}">{{$paintings->category->name}}</option>
                    @foreach ($categories as $category)
                        @if ($category->id != $paintings->category_id)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            {{-- label for description --}}
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="descrition" cols="30" rows="10" class="form-control">{{$paintings->description}}</textarea>

                {{-- <input type="text" id="description" name="description" value="{{$paintings->description}}" class="form-control" required autocomplete=""> --}}
            </div>

            {{-- label for price --}}
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="{{$paintings->price}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for size --}}
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" id="size" name="size" value="{{$paintings->size}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for weight --}}
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" id="weight" name="weight" value="{{$paintings->weight}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for weight --}}
            <div class="form-group">
                <label for="year">Painted In Year</label>
                <input type="date" id="year" name="year" value="{{$paintings->year}}" class="form-control" required autocomplete="">
            </div>

            {{-- for image section --}}
            {{-- <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" value="{{ asset('admin/images/paintings/'.$paintings->image) }}" class="form-control">
            </div> --}}

            <div class="from-group">
                <label for="iamge">Image</label>
                <div class="controls">
                    <div id="uniform-undefined">
                        <table>
                            <tr>
                                <td>
                                    <input name="image" id="image" type="file">
                                        @if(!empty($paintings->image))
                                            <input type="hidden" name="current_image" value="{{ $paintings->image }}">
                                        @endif
                                </td>
                                <td>
                                    @if(!empty($paintings->image))
                                        <img style="width:30%; height: 25%;" src="{{ asset('admin/images/paintings/'.$paintings->image) }}">
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- for featured item --}}
            <div class="form-group">
                <label class="control-label">Feature Item</label>
                <div class="control">
                    <input type="checkbox" name="featured" id="featured" @if($paintings->featured == "1") checked @endif value="1">
                </div>
            </div>

            {{-- label for status --}}
            <div class="form-group">
                <label>Display In Front</label>
                <div class="controls">
                    <input type="checkbox" name="status" id="status" @if($paintings->status == "1") checked @endif value="1">
                </div>
            </div>

            {{-- button --}}
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Update </button>
            </div>
        </form>
    </div>
</div>
@endsection
