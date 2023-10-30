<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Models\Employee;

class ShowController extends BaseController
{

    public function __invoke(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }


}
