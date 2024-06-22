@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5 mb-4 text-primary">Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-info">+ Create New Post</a>
    
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 200, $end='...') }}</p>
                            <p class="card-text"><small class="text-muted">Published on {{ $post->created_at->format('M d, Y') }}</small></p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read more</a>
                            @can('edit posts')
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            @endcan
                            @can('delete posts')
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection