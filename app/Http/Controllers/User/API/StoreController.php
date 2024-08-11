<?php

namespace App\Http\Controllers\User\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        return new UserResource($user);
    }
}
