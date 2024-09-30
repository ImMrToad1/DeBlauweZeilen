<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        if(Auth::check()){
            return back();
          }
       return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);
      if ( !auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'invalid login details');
      }
        return redirect()->route('home');
    }
}
