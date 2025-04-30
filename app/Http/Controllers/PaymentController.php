<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Subscription $subscription)
    {
        return view('payment', compact('subscription'));
    }

    public function process(Request $request)
    {
        // هنا ستتم معالجة الدفع
        // يمكنك إضافة منطق الدفع هنا

        return redirect()->route('payment.success')->with('success', 'تمت عملية الدفع بنجاح!');
    }
}
