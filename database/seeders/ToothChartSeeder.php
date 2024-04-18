<?php

namespace Database\Seeders;

use App\Models\ToothChart;
use Illuminate\Database\Seeder;

class ToothChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teeth = [
            'Tooth 1', 'Tooth 2', 'Tooth 3', 'Tooth 4', 'Tooth 5', 'Tooth 6', 'Tooth 7', 'Tooth 8',
            'Tooth 9', 'Tooth 10', 'Tooth 11', 'Tooth 12', 'Tooth 13', 'Tooth 14', 'Tooth 15', 'Tooth 16',
            'Tooth 17', 'Tooth 18', 'Tooth 19', 'Tooth 20', 'Tooth 21', 'Tooth 22', 'Tooth 23', 'Tooth 24',
            'Tooth 25', 'Tooth 26', 'Tooth 27', 'Tooth 28', 'Tooth 29', 'Tooth 30', 'Tooth 31', 'Tooth 32',
        ];

        foreach ($teeth as $tooth) {
            ToothChart::create(['name' => $tooth]);
        }
    }
}
