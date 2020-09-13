@extends('layouts.admin')

@section('title', 'Offer Component')
@section('page-title', 'Create Offer Component')

@section('content')
    <!--offer Component Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="font-weight: bold;">Create Offer Component</h3>
        </div>
        <!--form start-->
        <form action="{{route('offer_component.store')}}" method="post" role="form" class="">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="offerComponents">Offer Type</label>
                    <input type="text" name="offerComponents" id="offerComponents" class="form-control">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div><!--offer Component Create Box Ends Here-->
@endsection
