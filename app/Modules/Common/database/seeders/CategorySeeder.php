<?php

namespace App\Modules\Common\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\Common\Database\factories\categoryFactory;
use App\Modules\Common\Models\category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'PostCategory1','CategoryType' => 'post']);
        Category::create(['name' => 'PostCategory2','CategoryType' => 'post']);
        Category::create(['name' => 'PostCategory3','CategoryType' => 'post']);
        categoryFactory::new()->count(3)->create();
    }
}
