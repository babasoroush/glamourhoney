<?php

namespace App\Modules\AdminManager\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\AdminManager\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'blog_admin']);
        Role::create(['name' => 'shop_admin']);
    }
}
