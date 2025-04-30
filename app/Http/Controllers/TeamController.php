<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function showTeam()
    {
        $teamMembers = [
            [
                'name' => 'Athart Rachel',
                'role' => 'Gym Trainer',
                'image' => 'team-1.jpg',
                'social_links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'youtube' => '#',
                    'instagram' => '#',
                    'email' => '#'
                ]
            ],
            [
                'name' => 'John Doe',
                'role' => 'Personal Trainer',
                'image' => 'team-2.jpg',
                'social_links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'youtube' => '#',
                    'instagram' => '#',
                    'email' => '#'
                ]
            ],
            [
                'name' => 'Jane Smith',
                'role' => 'Yoga Instructor',
                'image' => 'team-3.jpg',
                'social_links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'youtube' => '#',
                    'instagram' => '#',
                    'email' => '#'
                ]
            ],
            // أضف المزيد من الأعضاء بنفس الطريقة
        ];

        return view('team', compact('teamMembers'));
    }
}
