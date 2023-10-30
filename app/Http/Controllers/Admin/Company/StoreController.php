<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Requests\Company\StoreRequest;
use App\Models\Company;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('companies.index');
    }

}
