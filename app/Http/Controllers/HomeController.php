<?php

namespace App\Http\Controllers;

use App\Models\Comm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request)
    {

        // $comms = Comm::query()
        //     ->with('employee', 'employee.company')
        //     ->latest('date')
        //     ->when(request('q'), function($query, $search) {
        //         $query->where('content', 'like', "%{$search}%");
        //     })
        //     ->simplePaginate(3)
        //     ->withQueryString();

        // with scope

        $comms = Comm::with('employee', 'employee.company')
            ->latest('date')
            ->search(request('q')) // 1st search = name of the scope, request('name of the input')
            ->simplePaginate(4)
            ->withQueryString(); //append all of the current request's query string values to the pagination links


        return view('home', [
            'comms' => $comms,
        ]);
    }
}
