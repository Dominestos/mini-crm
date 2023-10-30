<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        $companies = Company::all();

        return view('admin.employees.index', compact(['employees', 'companies']));
    }

    public function create()
    {
        $companyID = request()->get('companyID');
        $company = Company::findOrFail($companyID);
        return view('admin.employees.create', compact('company'));
    }

    public function store()
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

    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employees.edit', compact(['employee', 'companies']));
    }

    public function update(Employee $employee)
    {
        $data = request()->validate([
            'first_name' => ['string', 'max:20', 'required'],
            'second_name' => ['string', 'max:20', 'required'],
            'email' => ['email', 'required'],
            'phone' => ['string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required'],
            'note' => ['string', 'nullable'],
            'company_id' => ['integer', 'required'],
        ]);

        $employee->update($data);
        return redirect()->route('employees.show', [$employee->id]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

}
