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
}
