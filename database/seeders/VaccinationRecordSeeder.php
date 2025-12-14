<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VaccinationRecord;
use Faker\Factory as Faker;

class VaccinationRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 20 vaccination records for different patients
        for ($i = 1; $i <= 20; $i++) {
            VaccinationRecord::create([
                'patient_id' => $i, // Assuming patients 1-20 exist
                'vaccine_id' => $faker->randomElement([1, 2, 3]),
                'batch_id' => $faker->randomElement([1, 2, 3]),
                'worker_id' => $faker->randomElement([1, 2, 3, 4, 5]),
                'dose_number' => 1,
                'date_given' => $faker->date('Y-m-d', 'now'),
                'status' => $faker->randomElement(['Completed', 'Pending', 'Scheduled']),
                'remarks' => $faker->sentence
            ]);
        }
    }
}
