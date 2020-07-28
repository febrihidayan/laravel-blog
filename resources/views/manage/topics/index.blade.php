@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">All Topics</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.topics.create') }}" class="button is-light is-pulled-right">Create</a>
    </div>
</div>
<hr>
<table class="table is-hoverable is-striped is-fullwidth">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Menu</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->name }}</td>
                <td>{{ $topic->slug }}</td>
                <td>{{ $topic->menu ? 'Active' : 'Inactive' }}</td>
                <td>{{ $topic->created }}</td>
                <td>{{ $topic->updated }}</td>
                <td>
                    <a href="{{ route('manage.topics.show', $topic->id) }}" class="button is-small is-success">Show</a>
                    <a href="{{ route('manage.topics.edit', $topic->id) }}" class="button is-small is-info">Edit</a>
                    <form onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('manage.topics.destroy', $topic->id) }}" method="POST" class="is-inline">
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