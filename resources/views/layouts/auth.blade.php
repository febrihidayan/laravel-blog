@extends('layouts.default')

@section('content')
<div class="columns is-tablet is-centered">
    <div class="column is-three-fifths-tablet is-two-fifths-desktop">
        <div class="card" style="border-radius:10px;">
            @yield('auth')
        </div>
    </div>
</div>
@endsection