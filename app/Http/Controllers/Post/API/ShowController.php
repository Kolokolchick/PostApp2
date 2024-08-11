<?php

namespace App\Http\Controllers\Post\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::with('author')->findOrFail($id);
        
        return new PostResource($post);
    }
}
