<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            
            [
                'name' => 'István',
                'address' => 'Sopron',
                'type' => 'student',
                'contact' => 'istvan@gmail.com'
            ],

            [
                'name' => 'Réka',
                'address' => 'Budapest',
                'type' => 'student',
                'contact' => 'reka@gmail.com'
            ],

            [
                'name' => 'Gábor',
                'address' => 'teacher',
                'type' => 'faculty',
                'contact' => 'gabor@gmail.com'
            ],


            
            ]);
    }
}
