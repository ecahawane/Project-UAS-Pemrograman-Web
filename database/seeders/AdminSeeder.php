<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([

            'name' => 'Admin Sireka',

            'nim' => '000000',

            'prodi' => 'Administrator',

            'no_hp' => '08123456789',

            'email' => 'admin@gmail.com',

            'password' => Hash::make('admin123'),

            'role' => 'admin'

        ]);
    }
}