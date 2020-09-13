@extends('layouts.admin')

@section('title', 'Offer Details')
@section('page-title', 'Edit Offer Details')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Offer</h3>
    </div>
    <div class="box-body">
                    <!--Form Start-->
                    <form action="{{route('offers.update',['id' => $offers->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="{{$offers->title}}" class="form-control" required = "">
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="description" name="description" value="{{$offers->description}}" class="form-control" required = "">
                        </div>

                        <div class="form-group">
                            <label for="offer_type">Offer Type</label>
                            <select class="form-control" name="offerComponents">
                                @foreach ($offer_components as $components)
                                {{-- @dd($component->permission_component) --}}
                                    <option value="{{$components->id}}">{{$components->offerComponents}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            {{-- <textarea name="start_date" id="start_date" cols="30" rows="10" class="form-control"></textarea> --}}
                            <input type="date" id="start_date" name="start_date" value="{{$offers->start_date}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{$offers->end_date}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
    </div>
</div>
@endsection
