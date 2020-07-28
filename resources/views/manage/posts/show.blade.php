@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Show Post</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.posts.index') }}" class="button is-light is-pulled-right">Back</a>
        <a href="{{ route('manage.posts.edit', $post->id) }}" class="button is-light is-pulled-right mr-3">Edit</a>
    </div>
</div>
<hr>
<div class="columns">
    <div class="column is-8">
        <div class="field">
            <label class="label">Title</label>
            <pre>{{ $post->title }}</pre>
        </div>
        <div class="field">
            <label class="label">Slug</label>
            <pre>{{ $post->slug }}</pre>
        </div>
        <div class="field">
            <label class="label">Excerpt</label>
            <pre>{{ $post->excerpt }}</pre>
        </div>
        <div class="field">
            <label class="label">Content</label>
            <pre>{{ $post->content }}</pre>
        </div>
    </div>
    <div class="column">
        <div class="field">
            <label class="label">Topic</label>
            <pre>{{ $post->topics->name ?? '' }}</pre>
        </div>
        <div class="field">
            <label class="label">Tags</label>
            <pre>{{ $tags }}</pre>
        </div>
        <div class="field">
            <label class="label">Owner</label>
            <pre>{{ $post->users->name }}</pre>
        </div>
        <div class="field">
            <label class="label">Created</label>
            <pre>{{ $post->created }}</pre>
        </div>
        <div class="field">
            <label class="label">Updated</label>
            <pre>{{ $post->updated }}</pre>
        </div>
    </div>
</div>
@endsection