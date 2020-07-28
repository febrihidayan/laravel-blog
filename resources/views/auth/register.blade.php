@extends('layouts.auth')

@section('auth')
<div class="card-content">
    <h1 class="title is-4">Register</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="field">
            <label for="name" class="label">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="input" value="{{ old('name') }}">
            @error('name')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label for="email" class="label">Alamat Email</label>
            <input type="email" name="email" id="email" class="input" value="{{ old('email') }}">
            @error('email')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label for="password" class="label">Kata Sandi</label>
            <input type="password" name="password" id="password" class="input">
            @error('password')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="field">
            <label for="password_confirmation" class="label">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input">
        </div>
        <div class="field">
            <button type="submit" class="button is-primary is-fullwidth">Login</button>
        </div>
    </form>
</div>
@endsection
