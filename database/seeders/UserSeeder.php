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
        $users = [
            [
                'name'       => 'Super Admin',
                'email'      => 'superadmin@gmail.com',
                'password'   => '12345678',
                'is_admin'   => true,
            ],

            [
                'name'       => 'Admin',
                'email'      => 'admin@gmail.com',
                'password'   => '12345678',
                'is_admin'   => true,
            ],

            [
                'name'       => 'User',
                'email'      => 'user@gmail.com',
                'password'   => '12345678',
                'is_admin'   => false,
            ]
        ];


        foreach ($users as $user) {

            User::create([
                'name'      => $user['name'],
                'email'     => $user['email'],
                'password'  => $user['password'],
                'is_admin'  => $user['is_admin'],
            ]);

        }
    }
}
