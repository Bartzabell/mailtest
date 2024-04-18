<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PhilippinesProvincesSeeder::class,
            PhilippinesCitiesSeeder::class,
            // PhilippinesBarangaySeeder::class,
            ServicesTableSeeder::class,
            DiscountSeed::class,
            UsersSeeder::class,
            EventsTableSeeder::class,
            // AppointmentsTableSeeder::class,
            AppointmentServicesTableSeeder::class,
            HomepageContentSeeder::class,
            ToothChartSeeder::class,
            ToothConditionSeeder::class
        ]);
    }
}
