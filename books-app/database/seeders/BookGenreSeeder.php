<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_genre')->insert([
            ['book_id' => 1, 'genre_id' => 1],
            ['book_id' => 2, 'genre_id' => 2],
            ['book_id' => 3, 'genre_id' => 2],
        ]);
    }
}
