<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class UpdateController extends Controller
{

    public function __invoke(Company $company)
    {
        $data = request()->validate([
            'name' => ['max:20', 'required'],
            'email' => ['email', 'required'],
            'phone' => ['string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required'],
            'website' => ['url:http,https', 'required'],
            'logo' => ['image', 'nullable'],
            'note' => ['string', 'nullable'],

        ]);

        $company->update($data);
        return redirect()->route('companies.show', [$company->id]);
    }

}
