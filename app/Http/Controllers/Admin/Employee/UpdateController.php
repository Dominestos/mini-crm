<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->update($data);
        return redirect()->route('employees.show', [$employee->id]);
    }

}
