@extends('layouts.admin')

@section('title', 'Add Exhibition')
@section('page-title', 'Add New Exhibition')

@section('content')
    <!--Permission Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Add Exhibition</h3>
        </div>
        <div class="box-body">
            <!--Form Start-->
            <form action="{{route('exhibition.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title of Exhibition</label>
                    <input type="text" id="title" name="title" class="form-control" required = "">
                </div>

                <div class="form-group">
                    <label for="conducted_by">Conducted By</label>
                    <input type="text" id="conducted_by" name="conducted_by" class="form-control" required = "">
                    {{-- <input type="longtext" id="name" name="name" class="form-control"> --}}
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Exhibition Type</label>
                    <div class="control">
                        <input type="checkbox" name="type" id="type" value="ongoing"><h4>Ongoing</h4>
                    </div>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div><!--Permission Create Form Ends Here-->
@endsection
