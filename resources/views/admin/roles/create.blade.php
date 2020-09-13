@extends('layouts.admin')

@section('title', 'Add role')
@section('page-title', 'Add New role')

@section('content')
    <div class="box">
        <div class="box-header">
            <h4>Create Role</h4>
        </div>
        <div class="box-body">
            <form action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" class="form-control">
                </div>
                <div class="row">
                    @foreach ($per_components as $component)
                        <div class="col-md-4">
                            <label for="">{{$component->permission_component}}</label>
                            @foreach ($permissions as $permission)
                                @if ($permission->per_com_id == $component->id)
                                    <div class="checkbox">
                                        <label for="">
                                            <input type="checkbox" name="permission[]" value="{{$permission->id}}">
                                            {{$permission->permission}}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
