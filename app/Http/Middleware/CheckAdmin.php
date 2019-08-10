<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\NotAdminException;
use App\Exceptions\UserNotFoundException;

class CheckAdmin
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
        $user = Auth::user();
        if ($user == null) throw new UserNotFoundException();
        if ($user->role()->first()->name != 'admin') throw new NotAdminException();

        return $next($request);
    }
}
