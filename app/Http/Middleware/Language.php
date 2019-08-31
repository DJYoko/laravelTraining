<?php

namespace App\Http\Middleware;
use App;
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
        $fallBackLanguage = config('app.fallback_locale');
        $availableLanguages = config('app.available_locales');
        $requestedLang = $request->cookie('lang');

        $setLang = (!is_null($requestedLang) && in_array($requestedLang, $availableLanguages)) ? $requestedLang :  $fallBackLanguage;
        App::setLocale($setLang);

        return $next($request);
    }
}
