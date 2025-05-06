<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // عرض جميع الأعضاء
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', compact('members'));
    }

    // عرض نموذج إنشاء عضو جديد
    public function create()
    {
        return view('admin.members.create');
    }

    // حفظ العضو الجديد
    public function store(Request $request)
    {
        $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:members',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'Gender' => 'nullable|string',
            'Adress' => 'nullable|string',
            'Current_weight' => 'nullable|numeric',
            'Height' => 'nullable|numeric',
            'Goal_Weight' => 'nullable|numeric',
            'membership_type' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password); // تشفير الباسوورد

        Member::create($data);

        return redirect()->route('admin.members.index')
            ->with('success', 'Member created successfully.');
    }

    // عرض تفاصيل العضو
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    // عرض نموذج التعديل
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    // تحديث بيانات العضو
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:members,email,'.$member->id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'Gender' => 'nullable|string',
            'Adress' => 'nullable|string',
            'Current_weight' => 'nullable|numeric',
            'Height' => 'nullable|numeric',
            'Goal_Weight' => 'nullable|numeric',
            'membership_type' => 'nullable|string',
        ]);

        $data = $request->except('password');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $member->update($data);

        return redirect()->route('admin.members.index')
            ->with('success', 'Member updated successfully.');
    }

    // حذف العضو
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index')
            ->with('success', 'Member deleted successfully.');
    }
}
