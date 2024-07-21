<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    function dashboard()
    {
        $lots = DB::table('lots')->join('customers','customers.id','=','lots.kf_customer_Id')->select('customers.name','lots.*')->where('customers.id',auth()->user()->id)->get();
        return view('dashboard.index',compact('lots'));
    }

}
