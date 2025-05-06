<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainerController extends Controller
{
    // عرض جميع المدربين
    public function index()
    {
        $trainers = Trainer::all();
        return view('admin.trainers.index', compact('trainers'));
    }

    // عرض نموذج إضافة مدرب جديد
    public function create()
    {
        return view('admin.trainers.create');
    }

    // حفظ المدرب الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email',
            'bio' => 'nullable|string',
            'role' => 'required|string',
        ]);

        Trainer::create($request->all());

        return redirect()->route('admin.trainers.index')
            ->with('success', 'Trainer created successfully.');
    }

    // عرض تفاصيل مدرب معين
    public function show(Trainer $trainer)
    {
        return view('admin.trainers.show', compact('trainer'));
    }

    // عرض نموذج تعديل المدرب
    public function edit(Trainer $trainer)
    {
        return view('admin.trainers.edit', compact('trainer'));
    }

    // تحديث بيانات المدرب في قاعدة البيانات
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email,' . $trainer->id,
            'bio' => 'nullable|string',
            'role' => 'required|string',
        ]);

        $trainer->update($request->all());

        return redirect()->route('admin.trainers.index')
            ->with('success', 'Trainer updated successfully.');
    }

    // حذف مدرب من قاعدة البيانات
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return redirect()->route('admin.trainers.index')
            ->with('success', 'Trainer deleted successfully.');
    }
}
