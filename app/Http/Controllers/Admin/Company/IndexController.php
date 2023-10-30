<?php

namespace App\Http\Controllers\Admin\Company;

use App\Models\Company;

class IndexController extends BaseController
{

    public function __invoke()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

}
