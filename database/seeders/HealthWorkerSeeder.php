<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HealthWorker;
use Faker\Factory as Faker;

class HealthWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            HealthWorker::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'license_no' => $faker->unique()->numberBetween(100000, 999999),
                'contact' => $faker->phoneNumber,
                'role' => $faker->randomElement(['Nurse', 'Doctor', 'Technician'])
            ]);
        }
    }
}
