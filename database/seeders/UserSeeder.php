<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111111'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('111111'),
            'role' => 'bendahara'
        ]);

        User::create([
            'name' => 'Takmir',
            'email' => 'takmir@gmail.com',
            'password' => Hash::make('111111'),
            'role' => 'takmir'
        ]);
    }
}

