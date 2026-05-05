<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\User;

class AuthorPublisherBookSeeder extends Seeder
{

    public function run(): void{
    
            $authors = Author::all();
            $categories = Category::all();
            $publishers = Publisher::all();

        foreach ($authors as $author) {

            $publisher = $publishers->random();

            Book::factory(5)->create([
                'author_id' => $author->id,
                'category_id' => $categories->random()->id,
                'publisher_id' => $publisher->id,
            ]);
        }
    }
}