<?php

namespace Database\Factories;

use App\Models\book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<book>
 */
class BookfactoryFactory extends Factory
{

protected $model = Book::class;
    
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' => Author::factory(),
            'category_id' => category::factory(),
            'publisher_id'=> Publisher::factory(),
            'published_year' =>faker->year,
            'pages' => $this ->faker->numberBetween(100, 800),
        ];
    }
}
