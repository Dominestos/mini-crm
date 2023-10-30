<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Models\Company;
use App\Models\Employee;

class EditController extends BaseController
{

    public function __invoke(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employees.edit', compact(['employee', 'companies']));
    }

}
