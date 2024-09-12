<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'firstname' => 'Test',
                'lastname' => 'User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'firstname' => 'Admin',
            'lastname' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
            ],
            [
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'super_admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'super-admin'
            ],
            [
                'firstname' => 'Review',
                'lastname' => 'Er',
                'email' => 'reviewer@example.com',
                'password' => Hash::make('password'),
                'role' => 'reviewer'
                ]
        ]);
    }
}
