<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function setLanguage($requestedLang)
    {
        $fallBackLanguage   = config('app.fallback_locale');
        $availableLanguages = config('app.available_locales');

        $setLang = (!is_null($requestedLang) && in_array($requestedLang, $availableLanguages)) ? $requestedLang :  $fallBackLanguage;

        Cookie::queue('lang', $setLang, 60);
        return redirect()->back();
    }

}
