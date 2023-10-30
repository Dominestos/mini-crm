<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class DestroyController extends Controller
{

    public function __invoke(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

}
