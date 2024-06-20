@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post->id) }}">Read more</a>
            </div>
        @endforeach
    </div>
@endsection