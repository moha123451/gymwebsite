<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gym_classes')->insert([
            'class_name' => 'Yoga Class',
            'bio' => 'A relaxing yoga class for all levels.',
            'trainer_id' => 1, // Assuming trainer with ID 1 exists
            'category' => 'Yoga',
            'image' => 'yoga_class.jpg',
        ]);
    }
}
