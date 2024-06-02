<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample user data
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'username' => 'john',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'username' => 'jane',
                'password' => bcrypt('password456'),
            ],
            [
                'name' => 'Fitria Alfiana',
                'email' => 'falfiana@gmail,com',
                'username' => 'fitria',
                'password' => bcrypt('password789'),
            ]
    ];
    // Insert data into the users table
    DB::table('users')->insert($users);
    }
}
