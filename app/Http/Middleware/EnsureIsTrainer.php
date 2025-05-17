<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsTrainer
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. التحقق من تسجيل الدخول باستخدام جدول members
        if (!auth('member')->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        // 2. جلب بيانات العضو
        $member = auth('member')->user();

        // 3. الأدوار المسموحة (يمكنك تعديلها)
        $allowedRoles = ['trainer', 'admin', 'super_trainer'];

        if (!in_array($member->role, $allowedRoles)) {
            // تسجيل محاولة الوصول (إذا كنت تستخدم نظام التسجيل)
            activity()
                ->causedBy($member)
                ->log('محاولة وصول غير مصرح بها');

            return $member->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : abort(403, 'صلاحيات غير كافية');
        }

        // 4. التحقق من حالة الحساب لو عندك حقل is_active
        if (property_exists($member, 'is_active') && !$member->is_active) {
            auth('member')->logout();
            return redirect()->route('login')->with('error', 'الحساب غير مفعل');
        }

        return $next($request);
    }
}
