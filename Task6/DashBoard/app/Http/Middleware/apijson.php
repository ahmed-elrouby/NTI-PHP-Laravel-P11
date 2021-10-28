<?php

namespace App\Http\Middleware;

use App\Http\traits\apiTrait;
use Closure;
use Illuminate\Http\Request;

class apijson
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
        if(!request()->wantsJson())
        {
            return $this->ErrorMessage('The request is not a valid JSON.');
        }
        return $next($request);
    }
}
