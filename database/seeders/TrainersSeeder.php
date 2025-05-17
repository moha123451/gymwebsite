<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;
use App\Models\GymClass;

class TrainersSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data (optional)
        Trainer::truncate();
        GymClass::truncate();

        // 1. Create trainers
        $trainers = [
            [
                'name' => 'John Smith',
                'email' => 'john@example.com',
                'bio' => 'Certified fitness trainer with 10 years experience',
                'role' => 'Head Trainer',
                'specialization' => 'Strength Training',
                'phone' => '0512345678',
                'image' => 'trainer1.jpg'
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@example.com',
                'bio' => 'Yoga instructor certified in India',
                'role' => 'Yoga Trainer',
                'specialization' => 'Therapeutic Yoga',
                'phone' => '0598765432',
                'image' => 'trainer2.jpg'
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael@example.com',
                'bio' => 'CrossFit expert with multiple awards',
                'role' => 'CrossFit Coach',
                'specialization' => 'HIIT Training',
                'phone' => '0555555555',
                'image' => 'trainer3.jpg'
            ]
        ];

        foreach ($trainers as $trainerData) {
            $trainer = Trainer::create($trainerData);

            // 2. Create classes for each trainer
            $this->createClassesForTrainer($trainer);
        }
    }

    protected function createClassesForTrainer(Trainer $trainer)
    {
        $classes = [
            [
                'class_name' => 'Beginner Yoga',
                'bio' => 'Yoga for beginners',
                'description' => 'Comprehensive yoga sessions focusing on basics and breathing',
                'category' => 'Yoga',
                'duration' => '60 minutes',
                'schedule' => 'Monday & Wednesday 5-6 PM',
                'level' => 'Beginner',
                'price' => 100,
                'max_capacity' => 15,
                'is_active' => true,
                'image' => 'yoga.jpg'
            ],
            [
                'class_name' => 'Advanced Training',
                'bio' => 'Intensive workout class',
                'description' => 'High intensity strength and endurance exercises',
                'category' => 'Fitness',
                'duration' => '45 minutes',
                'schedule' => 'Tuesday & Thursday 7-8 AM',
                'level' => 'Advanced',
                'price' => 150,
                'max_capacity' => 20,
                'is_active' => true,
                'image' => 'fitness.jpg'
            ]
        ];

        // Adjust class data based on trainer specialization
        if ($trainer->specialization == 'Therapeutic Yoga') {
            $classes[0]['class_name'] = 'Advanced Yoga';
            $classes[0]['level'] = 'Advanced';
        }

        foreach ($classes as $classData) {
            GymClass::create(array_merge($classData, [
                'trainer_id' => $trainer->id
            ]));
        }
    }
}
