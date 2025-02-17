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
        $array =
        [    
                [
                'name' => 'Admin',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                ],
                [
                'name' => 'Owner',
                'email' => 'owner123@gmail.com',
                'password' => bcrypt('owner123'),
                'role' => 'owner',
                ]
        ];
                User::insert($array);
    }
}
