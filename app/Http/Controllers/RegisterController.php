<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return back();
          }
        return view("auth.register");
    }
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'postalcode' => 'required|string|max:10',
            'street_name' => 'required|string|max:255',
            'house_number' => 'required',
            'phone_number' => 'required|string|max:15',
            'experience' => 'required|string',
            'comment' => 'nullable|string|max:255',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'postalcode' => $request->postalcode,
            'street_name' => $request->street_name,
            'house_number' => $request->house_number,
            'phone_number' => $request->phone_number,
            'experience' => $request->experience ?? 'beginner',
            'comment' => $request->comment,
        ]);

    return redirect()->route('home')->with('success', 'User registered successfully!');
    }
}
