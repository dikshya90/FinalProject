@extends('layouts.admin')

@section('title', 'Permission Component')
@section('page-title', 'Create Permission Component')

@section('content')
    <!--Permission Component Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="font-weight: bold;">Create Permission Component</h3>
        </div>
        <!--form start-->
        <form action="{{route('permission_component.store')}}" method="post" role="form" class="">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="permission_component">Permission Component</label>
                    <input type="text" name="permission_component" id="permission_component" class="form-control">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div><!--Permission Component Create Box Ends Here-->
@endsection
