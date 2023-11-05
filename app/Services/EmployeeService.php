<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function store(array $data)
    {
        return Employee::create($data);

    }

    public function update(Employee $employee, array $data)
    {
        return $employee->update($data);
    }
}
