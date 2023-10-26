<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
    }
    public function change()
    {
        dd(request('lang'));
        return back()->with('language', );
    }
}
