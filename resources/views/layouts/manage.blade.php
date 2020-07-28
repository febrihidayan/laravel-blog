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
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name') }}</a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a href="{{ route('manage.dashboard') }}" class="navbar-item is-tab">Dashboard</a>
                    <a href="{{ route('manage.tags.index') }}" class="navbar-item is-tab">Tags</a>
                    <a href="{{ route('manage.topics.index') }}" class="navbar-item is-tab">Topics</a>
                    <a href="{{ route('manage.posts.index') }}" class="navbar-item is-tab">Posts</a>
                    <a href="{{ route('manage.users.index') }}" class="navbar-item is-tab">Users</a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">{{ Auth::user()->name }}</a>

                        <div class="navbar-dropdown">
                            <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>
</body>
</html>