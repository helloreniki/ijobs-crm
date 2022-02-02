<?php

namespace App\Http\Controllers;

use App\Models\Skill;
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
        return view('company.create', [
            'skills' => Skill::all(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'address' => '',
            'country' => 'required',
            'website' => '',
            'contacted' => 'nullable|boolean',
            'my_rating' => 'integer|between:1,5',
            'notes' => 'nullable|string|max:250',
            'skill_ids' => 'required' // array of ids input name="skill_ids[]"
        ]);

        $company = Company::create($attributes);

        $skill_ids = request('skill_ids');

        // attach each skill_id manually
        // foreach ($skill_ids as $skill_id) {
        //     $company->skills()->attach($skill_id);
        // }

        // attach whole array of skill_ids at once
        $company->skills()->attach($skill_ids);

        $company->save();

        return redirect()->route('company.index')->with('success', 'Company created successfully!');
    }

    public function edit(Company $company)
    {
        return view('company.edit', [
            'company' => $company,
        ]);
    }

    public function update(Company $company)
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

        $company->update(request()->all());

        return redirect()->route('company.index')->with('success', 'Company updated!');
    }

    public function destroy(Company $company)
    {
        $company->delete;

        return redirect()->route('company.index')->with('success', 'Company deleted!');
    }
}
