<?php

namespace App\Http\Controllers\Post\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Events\PostCreated;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $post = Post::create($data);

        event(new PostCreated($post));
        
        return new PostResource($post);
    }
}