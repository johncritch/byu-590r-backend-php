<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
                'name' => 'John Critchlow',
                'email' => 'johnnyrcritch@gmail.com',
                'email_verified_at' => null,
                'password' => bcrypt('abcd1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Test User',
                'email' => 'test@gmail.com',
                'email_verified_at' => null,
                'password' => bcrypt('abcd1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
        User::insert($users);
    }
}
