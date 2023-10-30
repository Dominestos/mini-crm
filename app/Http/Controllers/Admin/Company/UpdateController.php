<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        $this->service->update($company, $data);

        return redirect()->route('companies.show', [$company->id]);
    }

}
