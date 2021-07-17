<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class InfoController extends Controller
{
    function index()
    {
        return view('login');
    }

    function iflogingood(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|ajphanum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('login/persopage');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function persopage()
    {
        return view('persopage');
    }

    function logout()
    {
        Auth::logout();
        return redirect('info');
    }
}
