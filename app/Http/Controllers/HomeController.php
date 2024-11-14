<?php

namespace App\Http\Controllers;

use App\Models\Lots;
class HomeController extends Controller
{
    function dashboard()
    {
        $lots = Lots::join('customers','lots.customerCode','customers.code')
        ->select('lots.Lot_No','customers.name','lots.AWB','lots.Carrier','lots.Supplier','lots.country','lots.Inspection_Date','lots.url')
        ->orderBy('lots.created_at', 'desc')
        ->get();
        return view('dashboard.index',compact('lots'));
    }

}
