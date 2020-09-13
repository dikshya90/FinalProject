@extends('layouts.admin')

@section('title', 'Permission Component')
@section('page-title', 'Edit Permission Component')

@section('content')
        <!--Permission Component Edit Box Starts Here-->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title" style="font-weight:bold;">Edit Permission Component</h3>
            </div>
            <!--form start-->
            <form action="{{route('permission_component.update', ['id' => $permission_component->id])}}" method="post" role="form" class="">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group">
                        <label for="component">Permission Component</label>
                        <input type="text" name="permission_component" id="permission_component" value="{{$permission_component->permission_component}}" class="form-control">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div><!--Permission Component Edit Box Ends Here-->
@endsection
