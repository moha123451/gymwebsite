<?php

namespace App\Http\Controllers\Admin;

use App\Models\GymClass;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GymClassController extends Controller
{
    // Display all classes
    public function index()
    {
        $gymClasses = GymClass::with('trainer')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.gym-classes.index', compact('gymClasses'));
    }

    // Show create class form
    public function create()
    {
        $trainers = Trainer::all();
        $levels = ['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'];
        return view('admin.gym-classes.create', compact('trainers', 'levels'));
    }

    // Store new class
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'trainer_id' => 'required|exists:trainers,id',
            'category' => 'required|string',
            'bio' => 'nullable|string',
            'description' => 'nullable|string',
            'duration' => 'required|string|max:50',
            'schedule' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'max_capacity' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gym-classes', 'public');
        }

        GymClass::create($validated);

        return redirect()->route('admin.gym-classes.index')
            ->with('success', 'Class created successfully.');
    }

    // Show class details (admin view)
    public function show(GymClass $gymClass)
    {
        $gymClass->load('trainer');
        return view('admin.gym-classes.show', compact('gymClass'));
    }

    // Show edit class form
    public function edit(GymClass $gymClass)
    {
        $trainers = Trainer::all();
        $levels = ['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'];
        return view('admin.gym-classes.edit', compact('gymClass', 'trainers', 'levels'));
    }

    // Update class
    public function update(Request $request, GymClass $gymClass)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'trainer_id' => 'required|exists:trainers,id',
            'category' => 'required|string',
            'bio' => 'nullable|string',
            'description' => 'nullable|string',
            'duration' => 'required|string|max:50',
            'schedule' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'max_capacity' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'remove_image' => 'sometimes|boolean',
        ]);

        // Handle image removal
        if ($request->has('remove_image') && $request->remove_image) {
            if ($gymClass->image) {
                Storage::disk('public')->delete($gymClass->image);
                $validated['image'] = null;
            }
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gymClass->image) {
                Storage::disk('public')->delete($gymClass->image);
            }
            $validated['image'] = $request->file('image')->store('gym-classes', 'public');
        }

        $gymClass->update($validated);

        return redirect()->route('admin.gym-classes.index')
            ->with('success', 'Class updated successfully.');
    }

    // Delete class
    public function destroy(GymClass $gymClass)
    {
        // Delete associated image if exists
        if ($gymClass->image) {
            Storage::disk('public')->delete($gymClass->image);
        }

        $gymClass->delete();

        return redirect()->route('admin.gym-classes.index')
            ->with('success', 'Class deleted successfully.');
    }

    // Frontend class details view
    public function showPublic(GymClass $class)
    {
        $class->load('trainer');
        return view('classes.showtwo', compact('class'));
    }
}
