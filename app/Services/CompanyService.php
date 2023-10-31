<?php

namespace App\Services;

use App\Models\Company;

class CompanyService
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
