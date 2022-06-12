<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            "name"=>$this->faker->name,
            "email"=>$this->faker->email,
            "state"=>$this->faker->randomElement(['active', 'unsubscribed', 'junk', 'bounced', 'unconfirmed'])
        ];
    }
}
