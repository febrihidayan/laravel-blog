@extends('layouts.auth', [
    'title' => 'Confirm Password'
])

@section('content')
<div class="card-content">
    <h1 class="title is-4">Confirm Password</h1>
    {{ __('Please confirm your password before continuing.') }}
    <form action="{{ route('password.confirm') }}" method="post">
        @csrf
        <div class="field">
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password" class="input" value="{{ old('password') }}">
            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            @error('password')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <button type="submit" class="button is-primary is-fullwidth">Confirm Password</button>
        </div>
    </form>
</div>
@endsection
