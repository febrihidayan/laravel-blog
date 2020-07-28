@extends('layouts.default', [
    'title' => $post->title
])

@section('content')
<div class="columns is-centered">
    <div class="column is-7">
        <h1 class="title">{{ $post->title }}</h1>
        <small><i>{{ $post->excerpt }}</i></small>
        <hr>
        <div class="content">{{ $post->content }}</div>
        <div class="tags">
            @foreach ($post->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
            @endforeach
        </div>
        <hr>
        <div class="media">
            <div class="media-left">
                <figure class="image is-64x64">
                    <img src="{{ 'https://www.gravatar.com/avatar/'.md5(strtolower($post->users->email)).'.jpg?s=200&d=mm' }}" alt="profile" class="is-rounded">
                </figure>
            </div>
            <div class="media-content">
                <strong>{{ $post->users->name }}</strong>
            </div>
            @if (auth()->id() === $post->user_id)
                <div class="media-right">
                    <a href="{{ route('manage.posts.edit', $post->id) }}">Edit Post</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection