<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'=> 1,
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
