<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            Patient::create([
                'name' => $faker->name,
                'dob' => $faker->date('Y-m-d', '2000-01-01'),
                'contact' => $faker->phoneNumber,
                'eligibility_status' => $faker->randomElement(['Eligible', 'Not Eligible', 'Pending']),
                'notes' => $faker->sentence
            ]);
        }
    }
}
