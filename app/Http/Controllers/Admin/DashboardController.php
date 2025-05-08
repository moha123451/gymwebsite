<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Subscription;
use App\Models\GymClass;
use App\Models\Trainer;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_members' => Member::count(),
            'total_revenue' => Subscription::sum('subscribtion_amount'),
            'total_classes' => GymClass::count(),
            'total_trainers' => Trainer::count(),
            'recent_members' => Member::latest()->take(5)->get(),
            // 'active_subscriptions' => Subscription::where('status', 'active')->count()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
