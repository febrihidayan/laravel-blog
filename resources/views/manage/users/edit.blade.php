@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Edit User</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.users.index') }}" class="button is-light is-pulled-right">Back</a>
    </div>
</div>
<hr>
<form action="{{ route('manage.users.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="field">
        <label for="name" class="label">Name</label>
        <div class="control">
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="input" placeholder="user name">
        </div>
        @error('name')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="email" class="label">Email Address</label>
        <div class="control">
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="input" placeholder="user email">
        </div>
        @error('email')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="role" class="label">Role</label>
        <div class="control">
            <div class="select">
                <select name="role" id="role">
                    <optgroup label="Select role">
                        <option hidden value="{{ old('role', $user->role) }}">{{ old('role', $user->role) }}</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </optgroup>
                </select>
            </div>
        </div>
        @error('role')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="password" class="label">Password</label>
        <div class="control">
            <input type="password" name="password" id="password" class="input" placeholder="user password">
        </div>
        <small>Biarkan kosong untuk tidak mengganti password</small>
        @error('password')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <button type="submit" class="button is-fullwidth is-success">Save Change</button>
    </div>
</form>
@endsection