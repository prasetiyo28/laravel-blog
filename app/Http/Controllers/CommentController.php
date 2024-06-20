<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment([
            'content' => $request->get('content'),
            'user_id' => auth()->user()->id,
            'blog_post_id' => $postId,
        ]);
        $comment->save();

        return redirect()->route('posts.show', $postId)->with('success', 'Comment added!');
    }
}
