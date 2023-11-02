<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{

    public function __construct(
        protected EmployeeService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $companies = Company::all();

        return view('admin.employees.index', compact(['employees', 'companies']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companyID = request()->get('companyID');

        $company = Company::findOrFail($companyID);

        return view('admin.employees.create', compact('company'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('employees.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employees.edit', compact(['employee', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $this->service->update($employee, $data);

        return redirect()->route('employees.show', [$employee->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

}