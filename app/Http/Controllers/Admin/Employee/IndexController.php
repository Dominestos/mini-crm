<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class IndexController extends Controller
{

    public function __invoke()
    {
        $employees = Employee::all();
        $companies = Company::all();

        return view('admin.employees.index', compact(['employees', 'companies']));
    }

}
