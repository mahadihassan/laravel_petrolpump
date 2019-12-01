<?php

namespace App\Http\Middleware;

use App\BasicSetting;
use Closure;
use Illuminate\Support\Facades\View;

class BasicViewMiddleware
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
        $basic = BasicSetting::first();
        View::share('site_title',$basic->title);
        View::share('basic',$basic);
        return $next($request);
    }
}
