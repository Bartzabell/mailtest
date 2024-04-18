<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'user_id' => 1, // Adjust as needed
            'date_time' => $this->faker->dateTime,
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'canceled']),
            'concern' => $this->faker->sentence,
        ];
    }
}
