<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:member');
        $this->middleware('admin');
    }

    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.subscriptions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subscribtion_amount' => 'required|numeric|min:0', // نستخدم نفس المسمى في الميجرايشن
            'features' => 'nullable|string',
            'duration' => 'nullable|string',
            'date_time' => 'required|date' // إضافة حقل التاريخ
        ]);

        Subscription::create($request->all());

        return redirect()->route('admin.subscriptions.index')
                        ->with('success', 'تم إنشاء الاشتراك بنجاح');
    }

    public function show(Subscription $subscription)
    {
        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function edit(Subscription $subscription)
    {
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subscribtion_amount' => 'required|numeric|min:0',
            'features' => 'nullable|string',
            'duration' => 'nullable|string',
            'date_time' => 'required|date'
        ]);
        $subscription->update([
            'title' => $request->title,
            'description' => $request->description,
            'subscribtion_amount' => $request->subscribtion_amount,
            'features' => $request->features,
            'duration' => $request->duration,
            'date_time' => $request->date_time,
            // 'is_active' => $request->is_active ? 1 : 0,  // حفظ حالة الـ is_active
        ]);

        // $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index')
                        ->with('success', 'تم تحديث الاشتراك بنجاح');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')
                        ->with('success', 'تم حذف الاشتراك بنجاح');
    }
}
