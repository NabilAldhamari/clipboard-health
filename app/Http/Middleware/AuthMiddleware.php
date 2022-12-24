<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AuthMiddleware
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
        $token = $request->bearerToken();
        if(!$token) {
            return response()->json('No token provided', 401);
        }

        if (false === $this->isValidToken($token)) {
            return response()->json('Invalid token', 401);
        }

        return $next($request);
    }

    private function isValidToken(string $token): bool {
        return null !== User::where('token', '=', $token)->first();
    }
}
