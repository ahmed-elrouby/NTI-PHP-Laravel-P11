<?php

namespace App\Http\Middleware;

use App\Http\traits\apiTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestUser
{
    use apiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('sanctum')->check())
        {
            return $this->ErrorMessage('You Must Guest to Accesse This Api');
        }
        return $next($request);
    }
}
