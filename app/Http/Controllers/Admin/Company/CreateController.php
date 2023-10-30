<?php

namespace App\Http\Controllers\Admin\Company;

class CreateController extends BaseController
{

    public function __invoke()
    {
        return view('admin.companies.create');
    }

}
