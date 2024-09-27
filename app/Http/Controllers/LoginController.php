<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
    use ValidatesRequests;
    public function index()
    {

       return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required|min:1',
    ]);
      if ( !auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'invalid login details');
      }
        return redirect()->route('home');
    }
}
