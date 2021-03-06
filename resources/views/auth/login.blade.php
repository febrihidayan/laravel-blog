@extends('layouts.auth', [
    'title' => 'Login'
])

@section('auth')
<div class="card-content">
    <h1 class="title is-4">Login</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="field">
            <label for="email" class="label">Email Address</label>
            <input type="email" name="email" id="email" class="input" value="{{ old('email') }}">
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
            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="remender"> Remember me
            </label>
        </div>
        <div class="field">
            <button type="submit" class="button is-primary is-fullwidth">Login</button>
        </div>
    </form>
</div>
@endsection
