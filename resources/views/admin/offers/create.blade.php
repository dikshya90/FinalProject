@extends('layouts.admin')

@section('title', 'Offers')
@section('page-title', 'Add New Offer')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Create Offer</h3>
    </div>
    <div class="box-body">
                    <!--Form Start-->
                    <form action="{{route('offers.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required = "">
                        </div>

                        <div class="form-group">
                            <label for="description">Decsription</label>
                            <textarea type="text" id="description" name="description" rows="10" cols="30" class="form-control" required = ""></textarea>
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
                            <input type="date" id="start_date" name="start_date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
    </div>
</div>
@endsection
