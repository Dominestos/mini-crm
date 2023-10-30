<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class ShowController extends Controller
{

    public function __invoke(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }


}
