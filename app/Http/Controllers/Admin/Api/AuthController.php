<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    private function responseToken($token)
    {
        return $token ? ['token' => $token] :
            response()->json([
                "error" => \Lang::get('auth.failed')
            ], 400);
    }
}
