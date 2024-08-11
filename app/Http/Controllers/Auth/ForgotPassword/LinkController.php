<?php

namespace App\Http\Controllers\Auth\ForgotPassword;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\ForgotPassword\LinkRequest;

class LinkController extends Controller
{
    public function __invoke(LinkRequest $request)
    {
        $data = $request->validated();

        $status = Password::sendResetLink(
            $data
        );
    
        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)])
            : response()->json(['message' => __($status)], 400);
    }
}
