<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    
    protected $model = Author::class;

    public function definition()
    {
        return [
            'AU_NOME' => $this->faker->name(),
            'AU_EMAIL'=>$this->faker->email(),
            'AU_ANIVERSARIO'=>$this->faker->date()
        ];
    }
}
