<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }
    public function checkLogin(Request $request)
    {
        $vlaidator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if ($vlaidator->fails()) {
            // do something
        }

        $user = Auth::attempt($request->only('email', 'password'));
        return redirect()->route('admin.dashboard');
    }
}
