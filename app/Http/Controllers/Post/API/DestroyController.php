<?php

namespace App\Http\Controllers\Post\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        
        return response()->noContent();
    }
}
