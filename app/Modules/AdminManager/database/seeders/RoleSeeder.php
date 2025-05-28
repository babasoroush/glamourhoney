<?php

namespace App\Modules\AdminManager\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\AdminManager\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create(['name' => 'owner']);
        Role::create(['name' => 'blog_admin']);
        Role::create(['name' => 'shop_admin']);

        $ownerUser = User::firstOrCreate(
            ['email' => 'owner@example.com'],
            [
                'name' => 'Owner Admin',
                'password' => Hash::make('password'),
                'PhoneNumber' => '09123456789',
                'PostalCode' => '12345',
                'address' => 'Tehran, Iran',
            ]
        );
        $ownerUser->roles()->syncWithoutDetaching([$ownerRole->id]);
    }
}
