<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    function dashboard()
    {
        $lots = Lots::join('customers','lots.customerCode','customers.code')->select('customers.name','lots.*')->get();
        return view('dashboard.index',compact('lots'));
    }

}
