<?php

namespace App\Http\Controllers;

use App\Models\Comms;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        //show all latest comms
        $comms = Comms::with('employee', 'employee.company')->latest('date')->simplePaginate(15)->withQueryString();

        return view('home', [
            'comms' => $comms,
        ]);
    }
}
