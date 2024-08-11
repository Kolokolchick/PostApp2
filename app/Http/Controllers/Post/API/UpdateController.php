<?php

namespace App\Http\Controllers\Post\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->validated());

        return new PostResource($post);
    }
}
