<?php

namespace App\Http\Middleware;

use Closure;

class Language
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
        $val = $request->cookie('lang');
        // TODO get lang from Cooki
        // if en or ja is set => setLocale (it)
        // else or null => setLocale(fallback lang)  (from App config)
        dd($val);
        return $next($request);
    }
}
