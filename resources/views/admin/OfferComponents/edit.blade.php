@extends('layouts.admin')

@section('title', 'Offer Component')
@section('page-title', 'Edit Offer Component')

@section('content')
        <!--Offer Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title" style="font-weight:bold;">Edit Offer Component</h3>
            </div>
            <!--form start-->
            {{-- <form action="#" method="post" role="form" class=""> --}}
            <form action="{{route('offer_component.update', ['id' => $offer_components->id])}}" method="post" role="form" class="">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="offerComponents">Offer Type</label>
                        <input type="text" name="offerComponents" id="offerComponents" value="{{$offer_components->offerComponents}}" class="form-control">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div><!--Offer Component Edit Box Ends Here-->
@endsection
