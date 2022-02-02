<?php

namespace App\Http\Controllers;

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

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Contact was deleted!');
    }
}
