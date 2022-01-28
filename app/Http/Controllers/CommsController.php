<?php

namespace App\Http\Controllers;

use App\Models\Comms;
use App\Models\Employee;
use Illuminate\Http\Request;

class CommsController extends Controller
{
    public function create()
    {
        $employees = Employee::all();

        return view('comm.create', [
            'employees' => $employees,
        ]);
    }

    public function store()
    {
        // validation
        $attributes = request()->validate([
            'employee_id' => 'required|integer',
            'content' => 'required|',
            'date' => 'required|date|before_or_equal:today',
            'date_of_next_contact' => 'required|after_or_equal:today',
        ], [
            'employee_id.integer' => 'Please choose your contact.'
        ]);

        // create comm

        Comms::create($attributes);

        // return redirect
        return redirect()->route('home')->with('success', 'Your comm was added successfully!');
    }
}
