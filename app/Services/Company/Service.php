<?php

namespace App\Services\Company;

use App\Models\Company;

class Service
{
    public function store(array $data): void
    {
        Company::create($data);
    }

    public function update(Company $company, array $data): void
    {
        $company->update($data);
    }
}
