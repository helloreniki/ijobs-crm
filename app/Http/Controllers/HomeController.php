<?php

namespace App\Http\Controllers;

use App\Models\Comm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        //show all latest comms
        $comms = Comm::with('employee', 'employee.company')->latest('date')->simplePaginate(15)->withQueryString();

        return view('home', [
            'comms' => $comms,
        ]);
    }
}
