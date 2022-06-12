<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->randomElement(['name','age','email','phone']),
            "type"=>$this->faker->randomElement(['date', 'number', 'string', 'boolean']),
        ];
    }
}
