<?php

namespace App\Http\Controllers\Admin\Company;

use App\Models\Company;

class EditController extends BaseController
{

    public function __invoke(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

}
