<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TrainersController extends Controller
{
    /**
     * Display trainer dashboard with statistics.
     */
    public function dashboard(): View
    {
        $stats = [
            'totalTrainers' => Trainer::count(),
            'newThisMonth' => Trainer::whereMonth('created_at', now()->month)
                                  ->whereYear('created_at', now()->year)
                                  ->count(),
            'specializationsCount' => Trainer::select('specialization')
                                          ->distinct()
                                          ->whereNotNull('specialization')
                                          ->count(),
            'recentTrainers' => Trainer::latest()->take(5)->get()
        ];

        return view('trainer.dashboard', $stats);
    }

    /**
     * Display a listing of the trainers.
     */
    public function index(): View
    {
        $trainers = Trainer::latest()->paginate(10);
        return view('trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new trainer.
     */
    public function create(): View
    {
        return view('trainer.create');
    }

    /**
     * Store a newly created trainer in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\p{Arabic}\p{L}\s\-]+$/u' // Allows Arabic, English letters, spaces and hyphens
            ],
            'email' => [
                'required',
                'email',
                'unique:trainers,email',
                'max:255'
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^[\+\d\s\-\(\)]{10,20}$/' // Phone number validation
            ],
            'specialization' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[\p{Arabic}\p{L}\s\-]+$/u'
            ],
            'bio' => [
                'nullable',
                'string',
                'max:1000'
            ],


            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:2048', // 2MB
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
            ]
        ], [
            'name.regex' => 'The name may only contain letters, spaces and hyphens.',
            'phone.regex' => 'Please enter a valid phone number.',
            'image.dimensions' => 'Image must be between 100x100 and 2000x2000 pixels.'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->uploadImage($request->file('image'));
        }

        Trainer::create($validatedData);

        return redirect()
            ->route('trainer.index')
            ->with('success', 'Trainer created successfully.');
    }

    /**
     * Display the specified trainer.
     */
    public function show(Trainer $trainer): View
    {
        return view('trainer.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified trainer.
     */
    public function edit(Trainer $trainer): View
    {
        return view('trainer.edit', compact('trainer'));
    }

    /**
     * Update the specified trainer in storage.
     */
    public function update(Request $request, Trainer $trainer): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\p{Arabic}\p{L}\s\-]+$/u'
            ],
            'email' => [
                'required',
                'email',
                'unique:trainers,email,'.$trainer->id,
                'max:255'
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^[\+\d\s\-\(\)]{10,20}$/'
            ],
            'specialization' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[\p{Arabic}\p{L}\s\-]+$/u'
            ],
            'bio' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
            ]
        ], [
            'name.regex' => 'The name may only contain letters, spaces and hyphens.',
            'phone.regex' => 'Please enter a valid phone number.',
            'image.dimensions' => 'Image must be between 100x100 and 2000x2000 pixels.'
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($trainer->image) {
                $this->deleteImage($trainer->image);
            }
            $validatedData['image'] = $this->uploadImage($request->file('image'));
        }

        $trainer->update($validatedData);

        return redirect()
            ->route('trainers.index')
            ->with('success', 'Trainer updated successfully.');
    }

    /**
     * Remove the specified trainer from storage.
     */
    public function destroy(Trainer $trainer): RedirectResponse
    {
        // Delete associated image if exists
        if ($trainer->image) {
            $this->deleteImage($trainer->image);
        }

        $trainer->delete();

        return redirect()
            ->route('trainer.index')
            ->with('success', 'Trainer deleted successfully.');
    }

    /**
     * Upload image to storage.
     */
    private function uploadImage($image): string
    {
        return $image->store('trainers', 'public');
    }

    /**
     * Delete image from storage.
     */
    private function deleteImage($imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
