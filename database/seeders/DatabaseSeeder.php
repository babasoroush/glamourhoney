<?php

namespace Database\Seeders;

use App\Modules\User\database\seeders\UserSeeder;
use App\Modules\AdminManager\database\seeders\RoleSeeder;
use App\Modules\Common\database\seeders\CategorySeeder;
use App\Modules\Blog\database\seeders\PostSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
