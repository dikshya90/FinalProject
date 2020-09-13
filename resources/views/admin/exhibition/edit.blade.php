@extends('layouts.admin')

@section('title', 'Edit Exhibition Information')
@section('page-title', 'Edit Exhibition Information')

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title" style="font-weight:bold;">Edit Exhibition</h3>
            </div>
            <!--form start-->
            <form action="{{route('exhibition.update', ['id' => $exhibition->id])}}" method="post" role="form" class="">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Title Of Exhibition</label>
                        <input type="text" name="title" id="title" value="{{$exhibition->title}}" class="form-control">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Conducted By</label>
                        <input type="text" name="conducted_by" id="conducted_by" value="{{$exhibition->conducted_by}}" class="form-control">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Location</label>
                        <input type="text" name="location" id="location" value="{{$exhibition->location}}" class="form-control">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Type of Exhibition</label>
                        {{-- <input type="text" name="type" id="type" value="{{$exhibition->type}}" class="form-control"> --}}
                        <div class="control">
                            <input type="checkbox" name="type" id="type" @if($exhibition->type == "ongoing") checked @endif value="ongoing"> Ongoing
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="{{$exhibition->start_date}}" class="form-control">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{$exhibition->end_date}}" class="form-control">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection
