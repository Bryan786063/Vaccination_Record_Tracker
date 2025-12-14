<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaccine;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vaccine::create([
            'name' => 'COVID-19 Vaccine',
            'manufacturer' => 'Pfizer',
            'doses_required' => 2,
            'notes' => 'mRNA vaccine'
        ]);

        Vaccine::create([
            'name' => 'Influenza Vaccine',
            'manufacturer' => 'Sanofi',
            'doses_required' => 1,
            'notes' => 'Seasonal flu vaccine'
        ]);

        Vaccine::create([
            'name' => 'Hepatitis B Vaccine',
            'manufacturer' => 'GSK',
            'doses_required' => 3,
            'notes' => 'Prevents Hepatitis B'
        ]);
    }
}
