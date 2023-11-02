<?php

namespace App\Services;

use App\Models\Company;

class CompanyService
{
    public function store(array $data)
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data)
    {
        $company->update($data);
    }
}
