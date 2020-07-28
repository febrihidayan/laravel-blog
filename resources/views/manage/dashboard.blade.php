@extends('layouts.manage')

@section('content')
<h1 class="title is-4">Dashboard</h1>
<hr>
<div class="tile is-ancestor has-text-centered">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <p class="title">{{ $tile['tags'] }}</p>
            <p class="subtitle">Tags</p>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child box">
            <p class="title">{{ $tile['topics'] }}</p>
            <p class="subtitle">Topics</p>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child box">
            <p class="title">{{ $tile['posts'] }}</p>
            <p class="subtitle">Posts</p>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child box">
            <p class="title">{{ $tile['users'] }}</p>
            <p class="subtitle">Users</p>
        </article>
    </div>
</div>
<div class="columns mt-4">
    <div class="column">
        <h1 class="title is-4">New Posts</h1>
        <table class="table is-hovered is-fullwidth">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Owner</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->users->name }}</td>
                        <td>{{ $post->created }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="column">
        <h1 class="title is-4">New Users</h1>
        <table class="table is-hovered is-fullwidth">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection