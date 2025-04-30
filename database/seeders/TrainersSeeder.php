<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trainer;
use App\Models\GymClass;
class TrainersSeeder extends Seeder
{


public function run()
{
    // إضافة مدرب جديد
    $trainer = Trainer::create([
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'bio' => 'Experienced yoga instructor',
        'role' => 'Trainer'
    ]);

    // إضافة دورة تدريبية مرتبطة بالمدرب الذي تم إضافته
    GymClass::create([
        'class_name' => 'Yoga',
        'bio' => 'A relaxing yoga class',
        'trainer_id' => $trainer->id,
        'category' => 'Fitness',
        'image' => 'yoga.jpg',
    ]);
}

}
