<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class ShowController extends Controller
{

    public function __invoke(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }


}
