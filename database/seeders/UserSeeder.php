<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '00000000-0000-0000-0000-000000000000',
            'email' => 'theadamz91@gmail.com',
            'name' => 'Developer',
            'password' => '12345678',
            'email_verified_at' => now(),
            'is_active' => true,
            'def_route' => '/dashboard',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'email' => 'administrator@email.com',
            'name' => 'Administrator',
            'password' => '12345678',
            'email_verified_at' => now(),
            'is_active' => true,
            'def_route' => '/dashboard',
        ]);
    }
}
