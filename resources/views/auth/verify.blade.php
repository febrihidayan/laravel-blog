@extends('layouts.auth', [
    'title' => 'Verify Your Email Address'
])

@section('auth')
<div class="card-content">
    <h1 class="title is-4">Verify Your Email Address</h1>
    @if (session('resent'))
        <div class="notification is-success">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif
    <p>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}
    </p>
    <br>
    <form action="{{ route('verification.resend') }}" method="post">
        @csrf
        <div class="field">
            <button type="submit" class="button is-primary is-fullwidth">click here to request another</button>
        </div>
    </form>
</div>
@endsection
