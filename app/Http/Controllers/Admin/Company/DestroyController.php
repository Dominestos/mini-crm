<?php

namespace App\Http\Controllers\Admin\Company;

use App\Models\Company;

class   DestroyController extends BaseController
{

    public function __invoke(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }

}
