@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Show Tag</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.tags.index') }}" class="button is-light is-pulled-right">Back</a>
        <a href="{{ route('manage.tags.edit', $tag->id) }}" class="button is-light is-pulled-right mr-3">Edit</a>
    </div>
</div>
<hr>
<div class="content">
    <div class="field">
        <label class="label">Name</label>
        <pre>{{ $tag->name }}</pre>
    </div>
    <div class="field">
        <label class="label">Slug</label>
        <pre>{{ $tag->slug }}</pre>
    </div>
    <div class="field">
        <label class="label">Created</label>
        <pre>{{ $tag->created }}</pre>
    </div>
    <div class="field">
        <label class="label">Updated</label>
        <pre>{{ $tag->updated }}</pre>
    </div>
</div>
@endsection