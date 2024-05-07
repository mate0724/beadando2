<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'konyvtaros',
            ],
            
            [
                'name' => 'Kovacs',
                'email' => 'kovacs@gmail.com',
                'password' => Hash::make('112'),
                'role' => 'user',
            ]

            ]);
    }
}
