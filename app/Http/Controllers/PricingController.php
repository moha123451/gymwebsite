<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class PricingController extends Controller
{

        // دالة لعرض جميع خطط الاشتراك
    public function showPricingPlans()
    {
        // جلب جميع الخطط من جدول الاشتراكات
        $subscriptions = Subscription::all();
        // تمرير البيانات إلى صفحة الـ View
        return view('index', compact('subscriptions'));


    }
    public function services()
{
    $subscriptions = Subscription::all();
    return view('services', compact('subscriptions'));
}

}
