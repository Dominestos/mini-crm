<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{

    public function __construct(
        protected CompanyService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create')->renderSections()['content'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($company = $this->service->store($data)) {
            return new CompanyResource($company);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'))->renderSections()['content'];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        if($this->service->update($company, $data)) {
            return new CompanyResource($company);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $message = $company->name.'. '.__('Company was successfully deleted');
        if($this->service->destroy($company)) {
            return redirect()->route('companies.index')->with('delete-message', $message);
        }

    }

}
