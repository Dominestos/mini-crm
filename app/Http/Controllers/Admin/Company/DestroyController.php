<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class   DestroyController extends Controller
{

    public function __invoke(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }

}
