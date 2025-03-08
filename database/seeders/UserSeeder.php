<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'surname' => 'Smith',
                'email' => 'admin@example.com',
                'password' => Hash::make('passworD12?_'),
                'rol' => 'admin',
                'birth_date' => '1990-01-01',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guest User 1',
                'surname' => 'Johnson',
                'email' => 'guest1@example.com',
                'password' => Hash::make('passworD12?_'),
                'rol' => 'guest',
                'birth_date' => '1995-05-15',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guest User 2',
                'surname' => 'Williams',
                'email' => 'guest2@example.com',
                'password' => Hash::make('passworD12?_'),
                'rol' => 'guest',
                'birth_date' => '2000-07-20',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}