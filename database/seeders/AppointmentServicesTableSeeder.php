<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Service;
use App\Models\AppointmentService;
use Carbon\Carbon;

class AppointmentServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::pluck('id');
        $services = Service::pluck('id');

        // Start generating 10 appointments from January 17, 2024, 7 am
        $startDate = Carbon::create(2024, 1, 17, 7, 0, 0);

        // Loop until 10 appointments are generated or until February 29, 2024, 5 pm
        $appointmentsGenerated = 0;
        while ($appointmentsGenerated < 10 && $startDate->lte(Carbon::create(2024, 2, 29, 17, 0, 0))) {
            $user_id = $users->random();
            $service_id = $services->random();

            // Check if the appointment time is within the allowed hours
            if ($startDate->isWeekday() && $startDate->hour >= 7 && $startDate->hour <= 17) {
                // Create the appointment
                $appointment = Appointment::factory()->create([
                    'user_id' => $user_id,
                    'date_time' => $startDate,
                ]);

                // Attach the service to the appointment through the pivot table (AppointmentService)
                AppointmentService::create([
                    'appointment_id' => $appointment->id,
                    'service_id' => $service_id,
                ]);

                $appointmentsGenerated++;
            }

            // Add 5 hours for the next appointment
            $startDate->addHours(5);
        }
    }
}
