<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Mr Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin12345'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Irfan Chowdhury',
                'email' => 'user123@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Arman Khan',
                'email' => 'arman123@gmail.com',
                'password' => Hash::make('arman123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shuzon Khan',
                'email' => 'shuzon123@gmail.com',
                'password' => Hash::make('shuzon123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mr Karim',
                'email' => 'karim123@gmail.com',
                'password' => Hash::make('karim123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        User::insert($data);
    }
}
