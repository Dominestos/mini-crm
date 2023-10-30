<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Models\Employee;

class DestroyController extends BaseController
{

    public function __invoke(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

}
