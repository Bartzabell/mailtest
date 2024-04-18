<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentsTableSeeder extends Seeder
{
    public function run()
    {
        Appointment::factory()->count(5)->create(); // Assuming you have an Appointment factory
    }
}
