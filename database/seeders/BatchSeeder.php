<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Batch;
use Faker\Factory as Faker;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Batch::create([
            'vaccine_id' => 1, // COVID-19
            'batch_number' => 'CV001',
            'expiry_date' => $faker->date('Y-m-d', '+1 year'),
            'quantity' => 100,
            'received_date' => $faker->date('Y-m-d', 'now')
        ]);

        Batch::create([
            'vaccine_id' => 2, // Influenza
            'batch_number' => 'FL001',
            'expiry_date' => $faker->date('Y-m-d', '+6 months'),
            'quantity' => 50,
            'received_date' => $faker->date('Y-m-d', 'now')
        ]);

        Batch::create([
            'vaccine_id' => 3, // Hepatitis B
            'batch_number' => 'HB001',
            'expiry_date' => $faker->date('Y-m-d', '+2 years'),
            'quantity' => 75,
            'received_date' => $faker->date('Y-m-d', 'now')
        ]);
    }
}
