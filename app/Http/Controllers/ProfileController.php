<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    Public function index()
    {
        $user = Auth::user();

        return view("auth.profile",
        [
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'postalcode' => 'required|string|max:10',
            'street_name' => 'required|string|max:255',
            'house_number' => 'required',
            'phone_number' => 'required|string|max:15',
            'experience' => 'required|string',
            'comment' => 'nullable|string|max:255',
        ]);

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->postalcode = $validatedData['postalcode'];
        $user->street_name = $validatedData['street_name'];
        $user->house_number = $validatedData['house_number'];
        $user->phone_number = $validatedData['phone_number'];
        $user->experience = $validatedData['experience'];
        $user->comment = $validatedData['comment'] ?? null;

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
