<?php

namespace App\Http\Middleware;

use App\Http\traits\apiTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVerified
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
        if(! Auth::guard('sanctum')->check()){
            return $this->ErrorMessage('Unauthorized User');
        }
        return $next($request);
    }
}
