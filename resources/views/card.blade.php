@extends('layouts.default')

@section('content')
<div class="columns is-centered is-multiline">
    @foreach ($posts as $post)
        <div class="column is-3">
            <a href="{{ route('single', $post->slug) }}">
                <div class="card" style="border-radius:8px;">
                    <div class="card-content">
                        <h1 class="title is-5">{{ $post->title }}</h1>
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="{{ 'https://www.gravatar.com/avatar/'.md5(strtolower($post->users->email)).'.jpg?s=200&d=mm' }}" alt="profile" class="is-rounded">
                                </figure>
                            </div>
                            <div class="media-content">
                                <strong>{{ $post->users->name }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection