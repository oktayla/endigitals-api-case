<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        $schoolName = sprintf('%s University', $this->faker->words(3, true));
        $schoolName = ucwords($schoolName);

        return [
            'name' => $schoolName,
            'phone_number' => $this->faker->phoneNumber()
        ];
    }
}
