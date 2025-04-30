<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        // اختيارياً: حذف بيانات الجلسة القديمة
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // أو أي صفحة تريد إعادة التوجيه لها بعد تسجيل الخروج
    }
}
