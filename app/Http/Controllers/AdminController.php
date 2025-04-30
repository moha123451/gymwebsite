<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; // تأكد من استيراد النموذج إذا كنت بحاجة لاستخدامه

class AdminController extends Controller
{
    public function __construct()
    {
        // تطبيق middleware على جميع دوال الكونترولر
        $this->middleware('auth:member'); // استخدام guard member بدلاً من auth العادي
        $this->middleware('admin'); // تأكد من تسجيل هذا الـ middleware في kernel.php
    }

    public function index()
    {
        // جلب بيانات إضافية للعرض (مثال)
        $totalMembers = Member::count();
        $recentMembers = Member::latest()->take(5)->get();

        return view('admin.dashboard', [
            'totalMembers' => $totalMembers,
            'recentMembers' => $recentMembers
        ]);
    }

    // يمكنك إضافة دوال إضافية هنا حسب احتياجاتك
    public function showMembers()
    {
        $members = Member::all();
        return view('admin.members.index', compact('members'));
    }

    public function createMember()
    {
        return view('admin.members.create');
    }

    // ... المزيد من الدوال حسب الحاجة
}
