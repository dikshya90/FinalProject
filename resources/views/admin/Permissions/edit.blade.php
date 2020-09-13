@extends('layouts.admin')

@section('title', 'Edit Permission')
@section('page-title', 'Edit Permission Details')

@section('content')
    <!--Permission Edit Box Starts Here-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Permission</h3>
        </div>
        <!--Box Body-->
        <div class="box-body">
            <!--Form Starts-->
            <form action="{{route('permission.update', ['id' => $permission->id])}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="permission">Permission</label>
                    <input type="text" id="permission" name="permission" value="{{$permission->permission}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="permission_component">Permission Component</label>
                    <select name="permission_component" id="permission_component" class="form-control">
                        <option value="{{$permission->per_com_id}}">{{$permission->component->permission_component}}</option>
                        @foreach ($permission_component as $component)
                            @if ($component->id != $permission->per_com_id)
                                <option value="{{$component->id}}">{{$component->permission_component}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update </button>
                </div>
            </form>
        </div>
    </div>
    <!--Permission Edit Box Ends Here-->
@endsection
