<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@vaistra.com',
                'role' => 'Admin',
                'type' => 0,
                'password' => Hash::make('987654321'),
                //    'pwd'=> '987654321',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@vaistra.com',
                'role' => 'Manager',
                'type' => 1,
                'password' => Hash::make('manager'),
                //    'pwd'=> 'manager',
            ],
            [
                'name' => 'User',
                'email' => 'user@vaistra.com',
                'role' => 'User',
                'type' => 2,
                'password' => Hash::make('user'),
                //    'pwd'=> 'user',
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
