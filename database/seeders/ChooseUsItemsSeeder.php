<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChooseUsItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choose_us_items')->insert([
            'icon_class' => 'fa fa-star',
            'title' => 'Quality Services',
            'description' => 'We provide top-quality gym services.',
        ]);
    }
}

