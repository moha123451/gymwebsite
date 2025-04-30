<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function construct()
    {
        $this->middleware('auth:member');
        $this->middleware('admin');
    }

    // عرض جميع الاشتراكات
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    // عرض نموذج إنشاء اشتراك جديد
    public function create()
    {
        return view('admin.subscriptions.create');
    }

    // حفظ الاشتراك الجديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subscribtion_amount' => 'required|numeric|min:0',
            'features' => 'nullable|string',
            'duration' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        Subscription::create($request->all());

        return redirect()->route('admin.subscriptions.index')
                        ->with('success', 'Subscription created successfully.');
    }

    // عرض تفاصيل اشتراك معين
    public function show(Subscription $subscription)
    {
        return view('admin.subscriptions.show', compact('subscription'));
    }

    // عرض نموذج تعديل اشتراك
    public function edit(Subscription $subscription)
    {
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    // تحديث بيانات الاشتراك
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subscribtion_amount' => 'required|numeric|min:0',
            'features' => 'nullable|string',
            'duration' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index')
                        ->with('success', 'Subscription updated successfully.');
    }

    // حذف اشتراك
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')
                        ->with('success', 'Subscription deleted successfully.');
    }
}
