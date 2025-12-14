<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create schedules for patients who haven't been vaccinated yet (patients 21-30)
        for ($i = 21; $i <= 30; $i++) {
            Schedule::create([
                'patient_id' => $i,
                'vaccine_id' => $faker->randomElement([1, 2, 3]),
                'dose_number' => 1,
                'scheduled_date' => $faker->date('Y-m-d', '+30 days'),
                'status' => $faker->randomElement(['Scheduled', 'Pending']),
                'notes' => $faker->sentence
            ]);
        }
    }
}
