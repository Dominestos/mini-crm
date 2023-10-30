<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CreateController extends Controller
{

    public function __invoke()
    {
        return view('admin.companies.create');
    }

}
