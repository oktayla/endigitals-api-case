<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\School;
use App\Models\Country;

class CampusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords( $this->faker->words(3, true) ),
            'address' => $this->faker->address(),
            'school_id' => School::factory(),
            'country_id' => Country::factory()
        ];
    }
}
