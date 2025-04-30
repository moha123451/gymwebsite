<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            [
                'title' => 'Basic Subscription',
                'description' => 'Basic subscription plan for gym access.',
                'subscribtion_amount' => 50.00,
                'date_time' => now(),
                'features' => 'Access to all gym equipment',
                'duration' => '1 Month',
            ],
            [
                'title' => 'Premium Subscription',
                'description' => 'Premium subscription plan with extra perks.',
                'subscribtion_amount' => 100.00,
                'date_time' => now(),
                'features' => 'Access to all gym equipment, free personal trainer sessions',
                'duration' => '3 Months',
            ]
        ]);
    }
}
