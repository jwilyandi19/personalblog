<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::toUser($request->input('token'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $next($request);
                return response()->json(['error' => 'Autentikasi Token salah']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $next($request);
                return response()->json(['error' => 'Autentikasi Token kadaluarsa']);
            } else {
                return $next($request);
                return response()->json(['error' => 'Terjadi kesalahan']);
                
            }
        }

        return $next($request);
    }
}
