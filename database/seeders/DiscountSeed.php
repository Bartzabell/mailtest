<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::create([
            'name' => 'Senior Citizen',
            'percentage' => 20,
        ]);
    }
}
