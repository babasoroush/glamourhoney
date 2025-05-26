<?php

namespace Database\Seeders;

use App\Modules\User\database\seeders\UserSeeder;
use App\Modules\AdminManager\database\seeders\RoleSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
