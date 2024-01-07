<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'username' => 'Admin',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => 2,
            'username' => 'User',
            'password' => Hash::make('1234'),
        ]);
    }
}
