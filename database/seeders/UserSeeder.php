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
                'name' => 'Irfan Chowdhury',
                'email' => 'user123@gmail.com',
                'password' => Hash::make('user123'),
            ],
            [
                'name' => 'Arman Khan',
                'email' => 'arman123@gmail.com',
                'password' => Hash::make('arman123'),
            ],
            [
                'name' => 'Shuzon Khan',
                'email' => 'shuzon123@gmail.com',
                'password' => Hash::make('shuzon123'),
            ],
            [
                'name' => 'Mr Karim',
                'email' => 'karim123@gmail.com',
                'password' => Hash::make('karim123'),
            ],
        ];

        User::insert($data);
    }
}
