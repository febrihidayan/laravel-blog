@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">All Posts</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.posts.create') }}" class="button is-light is-pulled-right">Create</a>
    </div>
</div>
<hr>
<table class="table is-hoverable is-striped is-fullwidth">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            @if (auth()->user()->role === 'admin')
                <th>Owner</th>
            @endif
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                @if (auth()->user()->role === 'admin')
                    <td>{{ $post->users->name }}</td>
                @endif
                <td>{{ $post->created }}</td>
                <td>{{ $post->updated }}</td>
                <td>
                    <a href="{{ route('manage.posts.show', $post->id) }}" class="button is-small is-success">Show</a>
                    <a href="{{ route('manage.posts.edit', $post->id) }}" class="button is-small is-info">Edit</a>
                    <form onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('manage.posts.destroy', $post->id) }}" method="POST" class="is-inline">
                        @csrf
                        @method('DELETE')
                        <button class="button is-small is-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection