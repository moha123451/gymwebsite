<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes_members')->insert([
            'trainer_id' => 1, // Assuming trainer with ID 1 exists
            'members_id' => 1, // Assuming member with ID 1 exists
        ]);
    }
}
