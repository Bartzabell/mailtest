<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToothCondition; // Adjust the namespace accordingly

class ToothConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            ['name' => 'Cavity', 'color' => '#FF5733'], // Example dental problem 1
            ['name' => 'Gingivitis', 'color' => '#FF5733'], // Example dental problem 2
            ['name' => 'Periodontitis', 'color' => '#FF5733'], // Example dental problem 3
            ['name' => 'Tooth Abscess', 'color' => '#FF5733'], // Example dental problem 4
            ['name' => 'Tooth Sensitivity', 'color' => '#FF5733'], // Example dental problem 5
        ];

        foreach ($conditions as $condition) {
            ToothCondition::create($condition);
        }
    }
}
