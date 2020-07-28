@extends('layouts.auth')

@section('auth')
<div class="card-content">
    <h1 class="title is-4">Reset Password</h1>
    @if (session('status'))
        <div class="notification is-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="field">
            <label for="email" class="label">Email Address</label>
            <input type="email" name="email" id="email" class="input" value="{{ old('email') }}">
            @error('email')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <button type="submit" class="button is-primary is-fullwidth">Send Password Reset Link</button>
        </div>
    </form>
</div>
@endsection
