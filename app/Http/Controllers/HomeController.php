<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    function dashboard()
    {
        $lots = Lots::join('customers','INSPECTIONS.fk_customer_id','customers.id')->select('customers.name','lots.*')->get();
        return view('dashboard.index',compact('lots'));
    }

}
