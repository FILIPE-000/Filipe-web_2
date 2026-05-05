<?php

namespace Database\Factories;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Publisher>
 */
class PublisherFactory extends Factory
{
    protected $model = publisher::class;

    public function definition()
    {
        return [
            'PUB_NOME'=>$this->faker->unique()->company,

            'PUB_SENHA'=>$this->faker->address,
        ];
    }
}
