<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        $company->update($data);
        return redirect()->route('companies.show', [$company->id]);
    }

}
