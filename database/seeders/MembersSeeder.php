<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'First_Name' => 'John',
            'Last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'), // Make sure to hash the password
            'phone_number' => '1234567890',
            'date_of_birth' => '1990-01-01',
            'Gender' => 'Male',
            'Adress' => '123 Main St, City, Country',
            'Current_weight' => 70.50,
            'Height' => 175.50,
            'Bmi' => 22.9,
            'Goal_Weight' => 65.00,
            'membership_type' => 'Premium',
            'role' => 'member',
        ]);

        // You can add more members if needed
        DB::table('members')->insert([
            'First_Name' => 'Jane',
            'Last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('password456'),
            'phone_number' => '0987654321',
            'date_of_birth' => '1985-05-12',
            'Gender' => 'Female',
            'Adress' => '456 Another St, City, Country',
            'Current_weight' => 60.00,
            'Height' => 160.00,
            'Bmi' => 23.4,
            'Goal_Weight' => 55.00,
            'membership_type' => 'Basic',
            'role' => 'member',
        ]);
    }
}
