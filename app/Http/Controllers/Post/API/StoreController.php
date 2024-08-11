<?php

namespace App\Http\Controllers\Post\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create($validated);
        
        return new PostResource($post);
    }
}
