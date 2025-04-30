<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            // إضافة الأدوار
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'trainer']);
            Role::create(['name' => 'member']);

            // إضافة الصلاحيات
            Permission::create(['name' => 'edit_users']);
            Permission::create(['name' => 'view_dashboard']);
        }
    }
}
