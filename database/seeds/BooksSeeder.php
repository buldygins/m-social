<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = factory(Book::class, 5)->create()->each(function ($book) {
            $book->authors()->save(\App\Models\Author::inRandomOrder()->get()->first());
        });
    }
}
