<?php

namespace App\Http\Controllers\User\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        
        return UserResource::collection($users);
    }
}
