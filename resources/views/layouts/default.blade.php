@php
    $topics = \App\Topic::where('menu', true)->get();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
</head>
<body>
    <nav class="navbar has-shadow is-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name') }}</a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    @foreach ($topics as $item)
                        <a href="{{ $item->slug }}" class="navbar-item is-tab">{{ $item->name }}</a>
                    @endforeach
                </div>
                <div class="navbar-end">
                    @guest
                        <a href="{{ route('login') }}" class="navbar-item">Login</a>
                        <a href="{{ route('register') }}" class="navbar-item">Register</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">{{ Auth::user()->name }}</a>

                            <div class="navbar-dropdown">
                                <a href="{{ route('manage.dashboard') }}" class="navbar-item">Dashboard</a>
                                <hr class="navbar-divider">
                                <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="container mt-6">
            @yield('content')
        </div>
    </section>
</body>
</html>