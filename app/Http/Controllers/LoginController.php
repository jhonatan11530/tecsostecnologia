<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if (Auth::attempt(['emails' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard')->with('success', 'bienvenido a sistema ' . Auth::user());
        }

    }
    function dashboard()
    {
        return Auth::user()->name;
    }
}
