@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="card-title text-primary">{{ $post->title }}</h1>
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="card-title text-primary">Comments</h3>
                @foreach ($post->comments as $comment)
                    <div class="mb-3">
                        <div class="bg-light p-3 rounded">
                            <p class="mb-1">{{ $comment->content }}</p>
                            <p class="mb-0 text-muted">By {{ $comment->user->name }}</p>
                        </div>
                    </div>
                @endforeach

                @auth
                    <form method="POST" action="{{ route('comments.store', $post->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="content" class="form-label">Add Comment</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection