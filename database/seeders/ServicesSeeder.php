<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Service::create([
                'name' => 'Service' . $i,
                'description' => 'Lorem Ipsum',
                'price' => 100,
                'duration' => 10
            ]);
        }
    }
}
