@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">All Tags</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.tags.create') }}" class="button is-light is-pulled-right">Create</a>
    </div>
</div>
<hr>
<table class="table is-hoverable is-striped is-fullwidth">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->created }}</td>
                <td>{{ $tag->updated }}</td>
                <td>
                    <a href="{{ route('manage.tags.show', $tag->id) }}" class="button is-small is-success">Show</a>
                    <a href="{{ route('manage.tags.edit', $tag->id) }}" class="button is-small is-info">Edit</a>
                    <form onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('manage.tags.destroy', $tag->id) }}" method="POST" class="is-inline">
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