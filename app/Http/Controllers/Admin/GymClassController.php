<?php

namespace App\Http\Controllers\Admin;

use App\Models\GymClass;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GymClassController extends Controller
{
    // عرض جميع الفصول
    public function index()
    {
        $gymClasses = GymClass::with('trainer')->get();
        return view('admin.gym-classes.index', compact('gymClasses'));
    }

    // عرض نموذج إنشاء فصل جديد
    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.gym-classes.create', compact('trainers'));
    }

    // حفظ الفصل الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'trainer_id' => 'required|exists:trainers,id',
            'category' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gym-classes', 'public');
            $data['image'] = $imagePath;
        }

        GymClass::create($data);

        return redirect()->route('admin.gym-classes.index')
            ->with('success', 'Class created successfully.');
    }

    // عرض تفاصيل فصل معين
    public function show(GymClass $gymClass)
    {
        return view('admin.gym-classes.show', compact('gymClass'));
    }

    // عرض نموذج تعديل الفصل
    public function edit(GymClass $gymClass)
    {
        $trainers = Trainer::all();
        return view('admin.gym-classes.edit', compact('gymClass', 'trainers'));
    }

    // تحديث بيانات الفصل في قاعدة البيانات
    public function update(Request $request, GymClass $gymClass)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'trainer_id' => 'required|exists:trainers,id',
            'category' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($gymClass->image) {
                Storage::disk('public')->delete($gymClass->image);
            }

            $imagePath = $request->file('image')->store('gym-classes', 'public');
            $data['image'] = $imagePath;
        }

        $gymClass->update($data);

        return redirect()->route('admin.gym-classes.index')
            ->with('success', 'Class updated successfully.');
    }

    // حذف فصل من قاعدة البيانات
    public function destroy(GymClass $gymClass)
    {
        // حذف الصورة المرتبطة إذا وجدت
        if ($gymClass->image) {
            Storage::disk('public')->delete($gymClass->image);
        }

        $gymClass->delete();

        return redirect()->route('admin.gym-classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}
