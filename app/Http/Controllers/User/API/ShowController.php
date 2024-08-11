<?php

namespace App\Http\Controllers\User\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $user = User::findOrFail($id);
        
        return new UserResource($user);
    }
}
