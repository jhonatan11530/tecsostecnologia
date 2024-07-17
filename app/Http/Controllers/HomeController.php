<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard()
    {
        $lots = Lots::where('kf_customer_Id',auth()->user()->id)->get();
        return view('dashboard.index',compact('lots'));
    }

}
