<?php

namespace App\Services\Employee;

use App\Models\Employee;

class Service
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
