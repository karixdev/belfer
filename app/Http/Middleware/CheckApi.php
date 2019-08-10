<?php

namespace App\Http\Middleware;

use Closure;

class CheckApi
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
        $user = auth('api')->user();
        if ($user == null) throw new UserNotFoundException();
        if ($user->role()->first()->name != 'admin') throw new NotAdminException();

        return $next($request);
    }
}
