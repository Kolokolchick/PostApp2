<?php

namespace App\Http\Controllers\User\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);
        
        return new UserResource($user);
    }
}
