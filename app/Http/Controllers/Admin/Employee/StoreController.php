<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class StoreController extends Controller
{

    public function __invoke()
    {
        $data = request()->validate([
            'first_name' => ['string', 'max:20', 'required'],
            'second_name' => ['string', 'max:20', 'required'],
            'email' => ['email', 'required'],
            'phone' => ['string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required'],
            'note' => ['string', 'nullable'],
            'company_id' => ['integer', 'required'],
        ]);
        Employee::create($data);
        return redirect()->route('employees.index');
    }

}
