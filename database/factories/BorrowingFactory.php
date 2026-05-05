<?php

namespace Database\Factories;

use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\User;

/**
 * @extends Factory<Borrowing>
 */
class BorrowingFactory extends Factory
{
    public function definition():array
    {
        return [
            'borrowed_at'=> $this->faker->dateTimeBetween('-1 month','now'),
            'returned_at' =>
            $this->faker->optional()->dateTimeBetween('now','+1 month'),
        ];
    }
}
