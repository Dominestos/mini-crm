<?php

namespace App\Http\Controllers\Admin\Company;

use App\Models\Company;

class ShowController extends BaseController
{

    public function __invoke(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }


}
