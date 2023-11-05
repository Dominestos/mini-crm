<?php

namespace App\Services;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function store(array $data)
    {
        if (isset($data['logo'])) {
            $data['logo'] = $this->saveLogo($data['logo']);
        }
        return Company::create($data);
    }

    public function update(Company $company, array $data)
    {
        if (isset($data['logo'])) {
            if ($company->logo) {
                $this->deleteLogo($company->logo);
            }
            $data['logo'] = $this->saveLogo($data['logo']);
        }

        return $company->update($data);
    }

    public function destroy(Company $company)
    {
        if ($company->logo) {
            $this->deleteLogo($company->logo);
        }
        return $company->delete();
    }

    protected function saveLogo(UploadedFile $logo)
    {
        $filename = md5(Carbon::now() . $logo->getClientOriginalName()) . '.' . $logo->getClientOriginalExtension();

        return Storage::disk('public')->putFileAs('logo', $logo, $filename);
    }

    protected function deleteLogo(string $logo)
    {
        Storage::disk('public')->delete($logo);
    }
}
