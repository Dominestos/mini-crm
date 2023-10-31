<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function store(array $data)
    {
        Employee::create($data);

    }

    public function update(Employee $employee, array $data)
    {
        $employee->update($data);
    }
}
