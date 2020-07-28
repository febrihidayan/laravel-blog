@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Edit Tag</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.tags.index') }}" class="button is-light is-pulled-right">Back</a>
    </div>
</div>
<hr>
<form action="{{ route('manage.tags.update', $tag->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="field">
        <label for="name" class="label">Name</label>
        <div class="control">
            <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" class="input" placeholder="tag name">
        </div>
        @error('name')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="slug" class="label">Slug</label>
        <div class="control">
            <input type="text" name="slug" id="slug" value="{{ old('slug', $tag->slug) }}" class="input" placeholder="tag-slug">
        </div>
        @error('slug')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <button type="submit" class="button is-fullwidth is-success">Save Change</button>
    </div>
</form>
@endsection