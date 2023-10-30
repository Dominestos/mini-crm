<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompaniesController extends Controller
{

    public function index()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['max:20', 'required'],
            'email' => ['email', 'required'],
            'phone' => [
                'string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required',
            ],
            'website' => ['url:http,https', 'required'],
            'logo' => ['image', 'nullable'],
            'note' => ['string', 'nullable'],

        ]);
        Company::create($data);
        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Company $company)
    {
        $data = request()->validate([
            'name' => ['max:20', 'required'],
            'email' => ['email', 'required'],
            'phone' => [
                'string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required',
            ],
            'website' => ['url:http,https', 'required'],
            'logo' => ['image', 'nullable'],
            'note' => ['string', 'nullable'],

        ]);

        $company->update($data);
        return redirect()->route('companies.show', [$company->id]);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }

}
