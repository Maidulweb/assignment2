<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [   
                'name' => 'admin-Md._Fazlul_Bary',
                'email' => 'admin-Md._Fazlul_Bary@person-app.com',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user4',
                'email' => 'user4@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user5',
                'email' => 'user5@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user6',
                'email' => 'user6@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user7',
                'email' => 'user7@gmail.com',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
