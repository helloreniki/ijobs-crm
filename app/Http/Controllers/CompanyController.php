<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('employees', 'skills')->orderBy('name')->get();

        return view('company.index', [
            'companies' => $companies,
        ]);
    }

    public function show(Company $company)
    {
        return view('company.show', [
            'company' => $company
        ]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store()
    {
        // validation
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'address' => '',
            'country' => 'required',
            'website' => '',
            'contacted' => 'nullable|boolean',
            'my_rating' => 'integer|between:1,5',
            'notes' => 'nullable|string|max:250',
        ]);

        Company::create($attributes);

        return redirect()->route('company.index')->with('success', 'Company created successfully!');
    }
}
