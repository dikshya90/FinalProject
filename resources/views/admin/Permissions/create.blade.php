@extends('layouts.admin')

@section('title', 'Create Permission')
@section('page-title', 'Create New Permission')

@section('content')
    <!--Permission Create Box Starts Here-->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create Permission</h3>
        </div>
        <div class="box-body">
            <!--Form Start-->
            <form action="{{route('permission.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="permission">Permission</label>
                    <input type="text" id="permission" name="permission" class="form-control">
                </div>
                <div class="form-group">
                    <label>Permission Component</label>
                    <select class="form-control" name="permission_component">
                        @foreach ($permission_component as $component)
                        {{-- @dd($component->permission_component) --}}
                            <option value="{{$component->id}}">{{$component->permission_component}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div><!--Permission Create Form Ends Here-->
@endsection
