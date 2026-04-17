<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorPublisherBookSeeder extends Seeder
{

    public function run()
    {
        Author::factory(100)->create()->each(function($autor){
            $publisher = Publisher::factory()->create();

            $author->books()->createMany(
                Book::factory(10)->make([
                'category_id' => Category::inRandomOrder()->first()->id,
                'publisher_id' => $publisher->id,
                ])->toArray()
            );
        });
    }
}