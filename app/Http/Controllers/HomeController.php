<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    function dashboard()
    {
        $lots = Lots::all();
        return view('dashboard.index',compact('lots'));
    }

}
