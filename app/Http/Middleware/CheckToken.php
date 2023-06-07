<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;


class CheckToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->cookie('token');
        if (!$token) {
            return redirect()->route('login');
        }
        try {
            $user = JWTAuth::setToken($token)->authenticate();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
