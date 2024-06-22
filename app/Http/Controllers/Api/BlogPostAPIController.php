<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
class BlogPostAPIController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10); // Default limit is 10
        $posts = BlogPost::paginate($limit); // pagination default with limit
        return response()->json([
            'success' => true,
            'data' => $posts,
            'message' => 'Posts retrieved successfully.'
        ]);
    }
}
