<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(AuthorSeeder::class);
        $this->call(BindingSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FormatSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(LetterSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(BookAuthorSeeder::class);
        $this->call(BookCategorySeeder::class);
        $this->call(BookGenreSeeder::class);
    }
}
