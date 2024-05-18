<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            
            

            [
                'title' => 'Gyűrűk Ura',
                'author' =>  'J.R.R. Tolkien',
                'publisher' => 'Albatrosz',
                'year' => '1954',
                'edition' => '1',
                'ISBN' => 1234567,
                'available' => true,
                'copies' => 4
            ],

            [
                'title' => 'Halálsoron',
                'author' =>  'Stephen King',
                'publisher' => 'Signet Books',
                'year' => '1966',
                'edition' => '2',
                'ISBN' => 3456556,
                'available' => true,
                'copies' => 3
            ],

            [
                'title' => 'A Da Vinci-kód',
                'author' =>  'Dan Brown',
                'publisher' => 'Doubleday Group',
                'year' => '2003',
                'edition' => '4',
                'ISBN' => 5675433,
                'available' => true,
                'copies' => 8
            ],


            
            ]);
    }
}
