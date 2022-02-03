<?php

namespace App\Http\Controllers;

use App\Models\Comm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request)
    {

        // with scopeFilter in Comm.php

        $comms = Comm::with('employee', 'employee.company')
            ->latest('date')
            ->filter(request(['q', 'topRatingCompany'])) // 1st search = name of the scope, request('name of the input')
            ->simplePaginate(15)
            ->withQueryString(); //append all of the current request's query string values to the pagination links

        return view('home', [
            'comms' => $comms,
        ]);
    }
}
