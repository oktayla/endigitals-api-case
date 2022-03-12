<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        $countryName = $this->faker->words(2, true);
        $countryName = ucwords($countryName);

        return [
            'name' => $countryName
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function(Country $country) {
            School::factory()->count(5)->create();
        });
    }

}
