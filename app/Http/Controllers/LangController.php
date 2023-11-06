<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function __invoke($lang)
    {
        session(['locale' => $lang]);
        $locale = session('locale');
        App::setLocale($locale);

        session()->save();

        return back();
    }
}
