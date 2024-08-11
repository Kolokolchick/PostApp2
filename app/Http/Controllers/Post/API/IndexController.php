<?php

namespace App\Http\Controllers\Post\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->only(['title', 'body', 'author_id', 'created_at', 'updated_at']);

        $posts = Post::filterByAll($filters)
            ->sortBy($request->input('sort_by'), $request->input('sort_order', 'asc'))
            ->get();

        return PostResource::collection($posts);
    }
}
