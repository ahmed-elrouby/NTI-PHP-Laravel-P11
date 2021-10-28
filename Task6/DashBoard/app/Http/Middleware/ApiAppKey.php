<?php

namespace App\Http\Middleware;

use App\Http\traits\apiTrait;
use Closure;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ApiAppKey
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
        if (!Arr::has($request->header(),'app-api-key') || config('app.AppApiKey') != $request->header('app-api-key')) {
            return $this->ErrorMessage('You Can\'t Access This Api');
        }
        return $next($request);
    }
}
