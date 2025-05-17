<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    // عرض جميع المدربين
    public function index()
    {
        $trainers = Trainer::latest()->get();
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email',
            'bio' => 'nullable|string',
            'specialization' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('trainers', 'public');
        }

        Trainer::create($validated);

        return redirect()->route('admin.trainers.index')
            ->with('success', 'تم إضافة المدرب بنجاح');
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email,' . $trainer->id,
            'bio' => 'nullable|string',
            
            'specialization' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($trainer->image) {
                Storage::disk('public')->delete($trainer->image);
            }
            $validated['image'] = $request->file('image')->store('trainers', 'public');
        }

        $trainer->update($validated);

        return redirect()->route('admin.trainers.index')
            ->with('success', 'تم تحديث بيانات المدرب بنجاح');
    }

    // حذف مدرب من قاعدة البيانات
    public function destroy(Trainer $trainer)
    {
        // حذف الصورة المرتبطة إذا كانت موجودة
        if ($trainer->image) {
            Storage::disk('public')->delete($trainer->image);
        }

        $trainer->delete();

        return redirect()->route('admin.trainers.index')
            ->with('success', 'تم حذف المدرب بنجاح');
    }
}
