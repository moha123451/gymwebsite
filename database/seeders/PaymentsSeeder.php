<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'member_id' => 1, // Assuming member with ID 1 exists
            'amount' => 100.00,
            'payment_method' => 'Credit Card',
        ]);
    }
}
