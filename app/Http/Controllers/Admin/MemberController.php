<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // عرض جميع الأعضاء مع دعم البحث والفلترة
    public function index(Request $request)
    {
        $query = Member::query();

        // البحث بالاسم أو البريد الإلكتروني
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('First_Name', 'like', "%$search%")
                  ->orWhere('Last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // فلترة بنوع العضوية
        if ($request->has('membership_type')) {
            $query->where('membership_type', $request->membership_type);
        }

        // فلترة بالحالة (إذا كان لديك حقل status)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // الترتيب
        $orderBy = $request->get('order_by', 'created_at');
        $orderDirection = $request->get('order_direction', 'desc');
        $query->orderBy($orderBy, $orderDirection);

        // الترقيم مع 15 عنصراً لكل صفحة
        $members = $query->paginate(15);

        return view('admin.members.index', compact('members'));
    }

    // عرض نموذج إنشاء عضو جديد
    public function create()
    {
        // قيم افتراضية لأنواع العضوية
        $membershipTypes = ['Basic', 'Premium', 'VIP'];
        return view('admin.members.create', compact('membershipTypes'));
    }

    // حفظ العضو الجديد مع معالجة أفضل للأخطاء
    public function store(Request $request)
    {
        $validated = $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:members',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'Gender' => 'nullable|string|in:Male,Female,Other',
            'Adress' => 'nullable|string|max:500',
            'Current_weight' => 'nullable|numeric|min:0',
            'Height' => 'nullable|numeric|min:0',
            'Goal_Weight' => 'nullable|numeric|min:0',
            'membership_type' => 'nullable|string',
            'status' => 'nullable|string|in:active,inactive,suspended' // إذا كان لديك حقل status
        ]);

        try {
            $validated['password'] = Hash::make($request->password);
            $member = Member::create($validated);

            return redirect()->route('admin.members.index')
                ->with('success', 'Member created successfully.');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error creating member: ' . $e->getMessage());
        }
    }

    // عرض تفاصيل العضو مع بيانات إضافية
    public function show(Member $member)
    {
        // حساب BMI إذا كانت البيانات متوفرة
        $bmi = null;
        if ($member->Height && $member->Current_weight) {
            $bmi = round($member->Current_weight / (($member->Height/100) ** 2), 2);
        }

        return view('admin.members.show', compact('member', 'bmi'));
    }

    // عرض نموذج التعديل مع قيم محدثة
    public function edit(Member $member)
    {
        $membershipTypes = ['Basic', 'Premium', 'VIP'];
        $statuses = ['active', 'inactive', 'suspended']; // إذا كان لديك حقل status

        return view('admin.members.edit', compact('member', 'membershipTypes', 'statuses'));
    }

    // تحديث بيانات العضو مع تحسينات
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:members,email,'.$member->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'Gender' => 'nullable|string|in:Male,Female,Other',
            'Adress' => 'nullable|string|max:500',
            'Current_weight' => 'nullable|numeric|min:0',
            'Height' => 'nullable|numeric|min:0',
            'Goal_Weight' => 'nullable|numeric|min:0',
            'membership_type' => 'nullable|string',
            'status' => 'nullable|string|in:active,inactive,suspended'
        ]);

        try {
            if ($request->filled('password')) {
                $validated['password'] = Hash::make($request->password);
            } else {
                unset($validated['password']);
            }

            $member->update($validated);

            return redirect()->route('admin.members.index')
                ->with('success', 'Member updated successfully.');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating member: ' . $e->getMessage());
        }
    }

    // حذف العضو مع التعامل مع الأخطاء
    public function destroy(Member $member)
    {
        try {
            $member->delete();
            return redirect()->route('admin.members.index')
                ->with('success', 'Member deleted successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting member: ' . $e->getMessage());
        }
    }

    // دالة إضافية لتغيير حالة العضو (إذا كنت تحتاجها)
    public function changeStatus(Member $member, Request $request)
    {
        $request->validate(['status' => 'required|in:active,inactive,suspended']);

        $member->update(['status' => $request->status]);

        return back()->with('success', 'Member status updated successfully.');
    }
}
