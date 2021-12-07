<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>random_int(1,5),
            'idea' =>$this->faker->realText(19),
            'status' => random_int(1,2),
        ];
    }
}
