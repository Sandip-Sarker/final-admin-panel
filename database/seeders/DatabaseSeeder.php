<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = [
            [
               'name'       => 'admin',
               'email'      => 'admin@example.com',
               'password'   => '123456',
            ],

            [
                'name'      => 'user',
                'email'     => 'user@example.com',
                'password'  => '123456',
            ]
        ];


        foreach ($user as $user) {

            User::factory()->create([
                'name'      => $user['name'],
                'email'     => $user['email'],
                'password'  => $user['password']
            ]);

        }

    }
}
