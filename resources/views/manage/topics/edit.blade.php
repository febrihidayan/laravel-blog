@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Edit Topic</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.topics.index') }}" class="button is-light is-pulled-right">Back</a>
    </div>
</div>
<hr>
<form action="{{ route('manage.topics.update', $topic->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="field">
        <label for="name" class="label">Name</label>
        <div class="control">
            <input type="text" name="name" id="name" value="{{ old('name', $topic->name) }}" class="input" placeholder="topic name">
        </div>
        @error('name')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="slug" class="label">Slug</label>
        <div class="control">
            <input type="text" name="slug" id="slug" value="{{ old('slug', $topic->slug) }}" class="input" placeholder="topic-slug">
        </div>
        @error('slug')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label class="label">Menu</label>
        <label class="checkbox">
            <input type="checkbox" name="menu" {{ !empty($topic->menu) ? 'checked' : ''}}> Centang untuk jadikan menu
        </label>
    </div>
    <div class="field">
        <button type="submit" class="button is-fullwidth is-success">Save Change</button>
    </div>
</form>
@endsection