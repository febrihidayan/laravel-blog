@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Create New Post</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.posts.index') }}" class="button is-light is-pulled-right">Back</a>
    </div>
</div>
<hr>
<form action="{{ route('manage.posts.store') }}" method="post">
    @csrf
    <div class="columns">
        <div class="column is-8">
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="input" placeholder="post title">
                </div>
                @error('title')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>
                <div class="control">
                    <textarea name="excerpt" id="excerpt" class="textarea" placeholder="post excerpt">{{ old('excerpt') }}</textarea>
                </div>
                @error('excerpt')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="content" class="label">Content</label>
                <div class="control">
                    <textarea name="content" id="content" cols="30" rows="10" class="textarea" placeholder="post content">{{ old('content') }}</textarea>
                </div>
                @error('content')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label for="topic" class="label">Topic</label>
                <div class="control">
                    <div class="select">
                        <select name="topic" id="topic">
                            <optgroup label="Select topic">
                                <option value="" hidden>Select topic</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                @error('topic')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="tag" class="label">Tag</label>
                <div class="control">
                    <div class="select">
                        <select name="tag" id="tag">
                            <optgroup label="Select tag">
                                <option value="" hidden>Select tag</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                @error('tag')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <button type="submit" class="button is-fullwidth is-success">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection