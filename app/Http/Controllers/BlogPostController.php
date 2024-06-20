<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view posts', ['only' => ['index']]);
        $this->middleware('permission:create posts', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit posts', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete posts', ['only' => ['destroy']]);
        $this->middleware('permission:publish posts', ['only' => ['publish']]);
        $this->middleware('permission:unpublish posts', ['only' => ['unpublish']]);
    }

    public function index()
    {
        $posts = BlogPost::all();
        return view('blog_posts.index', compact('posts'));
    }

    public function create()
    {
        return view('blog_posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new BlogPost([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title') , "-"),
            'content' => $request->get('content'),
            'user_id' => auth()->user()->id,
        ]);
        $post->save();

        return redirect('/posts')->with('success', 'Post created!');
    }

    public function show($id)
    {
        $post = BlogPost::find($id);
        return view('blog_posts.show', compact('post'));
    }
}
