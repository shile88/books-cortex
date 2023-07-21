<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_category')->insert([
            ['book_id' => 1, 'category_id' => 1],
            ['book_id' => 2, 'category_id' => 2],
            ['book_id' => 3, 'category_id' => 2],
        ]);
    }
}
