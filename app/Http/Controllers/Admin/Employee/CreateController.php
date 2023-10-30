<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CreateController extends Controller
{

    public function __invoke()
    {
        $companyID = request()->get('companyID');
        $company = Company::findOrFail($companyID);
        return view('admin.employees.create', compact('company'));
    }

}
