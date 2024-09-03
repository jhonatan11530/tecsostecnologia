<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error','credenciales invalidas');
        }

        $user = User::where('name', $request->email)->first();

        if (Auth::attempt(['emails' => $user->emails, 'password' => $request->password], $request->remember)) {
            return redirect('dashboard')->with('success', 'bienvenido a sistema ' . Auth::user());
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
