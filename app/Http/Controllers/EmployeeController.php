<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->get(); // with('comms') not in index, but in show

        return view('employee.index', [
            'employees' => $employees,
        ]);
    }

    public function show(Employee $employee)
    {
        return view('employee.show', [
            'employee' => $employee,
        ]);
    }

    public function create()
    {
        $companies = Company::select('name', 'id')->get();

        return view('employee.create', [
            'companies' => $companies,
        ]);
    }

    public function store()
    {
        // validate
        $attributes = request()->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:25',
            'email' => 'required|email',
            'notes' => 'nullable|string|max:300',
        ], [
            'company_id.exists' => 'Please choose company.'
            ]
        );

        Employee::create($attributes);

        return redirect()->route('employee.index')->with('success', 'Contact created!');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::select('id', 'name')->get();

        return view('employee.edit', [
            'companies' => $companies,
            'employee' => $employee,
        ]);
    }

    public function update(Employee $employee)
    {
        $attributes = request()->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:25',
            'email' => 'required|email',
            'notes' => 'nullable|string|max:300',
        ], [
            'company_id.exists' => 'Please choose company.'
            ]
        );

        $employee->update();

        return redirect()->route('employee.index')->with('success', 'Employee updated!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Contact was deleted!');
    }
}
