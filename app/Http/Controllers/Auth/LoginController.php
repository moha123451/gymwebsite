<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // استخدام guard 'member' بدلاً من الافتراضي
        if (Auth::guard('member')->attempt($credentials)) {
            $member = Auth::guard('member')->user();

            // التوجيه بناءً على الدور
            if ($member->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($member->role === 'trainer') {
                return redirect()->route('trainer.dashboard');
            }
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('status', 'Logged out successfully');
    }
}
