@extends('layouts.admin')

@section('title', 'Edit User')
@section('page-title', 'Edit User Information')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Users</h3>
    </div>
    <!--Box Body-->
    <div class="box-body">
        <!--Form Starts-->
    <form action="{{route('user.update',['id'=>$user->id])}}" method="POST">
            @csrf
            @method('put')

            {{-- for name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for phone --}}
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for address --}}
            <div class="form-group">
                <label for="address">Name</label>
                <input type="text" id="address" name="address" value="{{$user->address}}" class="form-control" required autocomplete="">
            </div>

            {{-- label for password --}}
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            {{-- Confirm Password row --}}
            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            {{-- for role --}}
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="{{$user->role_id}}">{{$user->role->role}}</option>
                    @foreach ($role as $role)
                        @if ($role->id != $user->role_id)
                            <option value="{{$role->id}}">{{$role->role}}</option>
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
@endsection
