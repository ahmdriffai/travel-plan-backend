<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListTravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'place_id' => Place::factory()->create()->id,
        ];
    }
}
