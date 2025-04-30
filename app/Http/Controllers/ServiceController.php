<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class ServiceController extends Controller
{
    public function index()
{
    $subscriptions = Subscription::all(); // تأكد من استيراد نموذج Subscription
    return view('services', compact('subscriptions'));
}
}
