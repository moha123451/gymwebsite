<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $member = Member::create([
            'First_Name' => $request->First_Name,
            'Last_name' => $request->Last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'Gender' => $request->Gender,
            'Adress' => $request->Adress,
            'Current_weight' => $request->Current_weight,
            'Height' => $request->Height,
            'Bmi' => $request->Bmi,
            'Goal_Weight' => $request->Goal_Weight,
            'membership_type' => $request->membership_type,
        ]);

        Auth::login($member);
        return redirect()->route('index');
    }
}
