<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Service::create([
            'name' => 'Tooth Extraction',
            'price' => 1000.00,
            'description' => 'Remove tooth and everything',
            'duration' => 60,
        ]);

        Service::create([
            'name' => 'Root canal',
            'price' => 850.00,
            'description' => 'Put canal on tooth',
            'duration' => 45,
        ]);

        Service::create([
            'name' => 'Check up',
            'price' => 500.00,
            'description' => 'Check up',
            'duration' => 5,
        ]);

        // Add more services as needed
    }
}
