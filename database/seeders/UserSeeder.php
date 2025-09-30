<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Coffeeshop',
            'email' => 'admin@coffee.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir Coffeeshop',
            'email' => 'kasir@coffee.com',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);
    }
}
