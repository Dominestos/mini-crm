<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class IndexController extends Controller
{

    public function __invoke()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

}
