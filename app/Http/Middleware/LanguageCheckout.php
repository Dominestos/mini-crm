<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class LanguageCheckout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->input('lang');
        if (!in_array($lang, $this->getLanguageList())) {
            abort(400);
        }

        Session::put('locale', $lang);
        App::setLocale($lang);

        return $next($request);
    }

    public function getLanguageList()
    {
        $langArray = File::directories(lang_path());
        $languages = [];

        foreach ($langArray as $directory) {
            $languages[] = basename($directory);
        }
        return $languages;
    }
}
