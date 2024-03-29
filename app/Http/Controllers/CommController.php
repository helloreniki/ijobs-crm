<?php

namespace App\Http\Controllers;

use App\Models\Comm;
use App\Models\Employee;
use Illuminate\Http\Request;

class CommController extends Controller
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
            'content' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'date_of_next_contact' => 'required|after_or_equal:today',
        ], [
            'employee_id.integer' => 'Please choose your contact.'
        ]);

        // create comm

        Comm::create($attributes);

        // return redirect
        return redirect()->route('home')->with('success', 'Your comm was added successfully!');
    }

    public function edit(Comm $comm)
    {
        $employees = Employee::all();

        return view('comm.edit', [
            'comm' => $comm,
            'employees' => $employees,
        ]);
    }

    public function update(Comm $comm)
    {
        // validation
       $attributes = request()->validate([
            'employee_id' => 'required|integer',
            'content' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'date_of_next_contact' => 'required|after_or_equal:today',
        ], [
            'employee_id.integer' => 'Please choose your contact.'
        ]);

        // dd(request()->all());

        // update
        $comm->update(request()->all());

        // return redirect
        return redirect()->route('home')->with('success', 'Comm was updated successfully!');
    }

    public function destroy(Comm $comm)
    {
        $comm->delete();

        return redirect()->route('home')->with('success', 'Comm deleted successfully!');
    }
}
