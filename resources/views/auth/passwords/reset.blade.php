@extends('layouts.auth', [
    'title' => 'Reset Password'
])

@section('auth')
<div class="card-content">
    <h1 class="title is-4">Reset Password</h1>
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="field">
            <label for="email" class="label">Email Address</label>
            <input type="email" name="email" id="email" class="input" value="{{ $email ?? old('email') }}">
            @error('email')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password" class="input">
            @error('password')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label for="password_confirmation" class="label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input">
        </div>
        <div class="field">
            <button type="submit" class="button is-primary is-fullwidth">Reset Password</button>
        </div>
    </form>
</div>
@endsection
