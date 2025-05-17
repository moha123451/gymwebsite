<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer; // تأكد أنك أضفت هذا السطر
use App\Models\Subscription;
class MainController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all(); // جلب بيانات المدربين
        $subscriptions = Subscription::all(); // جلب بيانات الاشتراكات
        return view('index', compact('trainers', 'subscriptions'));
    }
}
