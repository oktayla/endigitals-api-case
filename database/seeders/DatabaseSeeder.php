<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Student;
use App\Models\User;
use App\Models\Campus;
use App\Models\Country;
use App\Models\School;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        //Student::factory()->times(10)->create();
        User::factory(10)->create();

        $countries = Country::factory()->count(100)->create();
        $schools = School::factory()->count(100)->create();

        $country_ids = $countries->pluck('id');
        $school_ids = $schools->pluck('id');

        $campuses = Campus::factory()
        ->count(1000)
        ->state(function(array $attributes) use($country_ids, $school_ids) {
            return [
                'school_id' => $school_ids->random(),
                'country_id' => $country_ids->random()
            ];
        })
        ->create();

        $campus_ids = $campuses->pluck('id');

        Student::factory()
        ->count(50000)
        ->state(function(array $attributes) use($campus_ids) {
            return [
                'campus_id' => $campus_ids->random()
            ];
        })
        ->create();

    }
}
