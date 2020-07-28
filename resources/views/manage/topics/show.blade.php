@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Show Topic</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.topics.index') }}" class="button is-light is-pulled-right">Back</a>
        <a href="{{ route('manage.topics.edit', $topic->id) }}" class="button is-light is-pulled-right mr-3">Edit</a>
    </div>
</div>
<hr>
<div class="content">
    <div class="field">
        <label class="label">Name</label>
        <pre>{{ $topic->name }}</pre>
    </div>
    <div class="field">
        <label class="label">Slug</label>
        <pre>{{ $topic->slug }}</pre>
    </div>
    <div class="field">
        <label class="label">Menu</label>
        <pre>{{ $topic->menu ? 'Active' : 'Inactive' }}</pre>
    </div>
    <div class="field">
        <label class="label">Created</label>
        <pre>{{ $topic->created }}</pre>
    </div>
    <div class="field">
        <label class="label">Updated</label>
        <pre>{{ $topic->updated }}</pre>
    </div>
</div>
@endsection