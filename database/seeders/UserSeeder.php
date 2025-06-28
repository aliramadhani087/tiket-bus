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
        User::insert([
            [
                'nama' => 'Ali',
                'username' => 'Ali',
                'email' => 'ali@gmail.com',
                'telepon' => '089288371047',
                'alamat' => 'Brebes',
                'role' => 'admin',
                'password' => bcrypt('1234'),
            ],
        ]);

        User::insert([
            [
                'nama' => 'Ainal',
                'username' => 'Ainal',
                'email' => 'ainal@gmail.com',
                'telepon' => '089288371047',
                'alamat' => 'Brebes',
                'role' => 'customer',
                'password' => bcrypt('1234'),
            ],
        ]);
    }
}
