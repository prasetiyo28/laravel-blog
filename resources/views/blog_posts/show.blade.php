@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <h3>Comments</h3>
        @foreach ($post->comments as $comment)
            <div>
                <p>{{ $comment->content }}</p>
                <p>By {{ $comment->user->name }}</p>
            </div>
        @endforeach

        @auth
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf
                <div class="form-group">
                    <label for="content">Add Comment</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endauth
    </div>
@endsection