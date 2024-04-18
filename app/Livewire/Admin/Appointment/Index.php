<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;
    public $minHour = 8;
    public $maxHour = 17-1;
    public $interval = 30;

    public function render()
    {
        $appointments = Appointment::where('status', 'scheduled')->get();

        $allAppointments = Appointment::all();
        // dd($)

        $events = array();
        $constraints = array();

        foreach ($appointments as $appointment) {

            $event = [
                'id' => $appointment->id,
                'title' => $appointment->concern,
                'start' => $appointment->date_time,
                'end' => '2024-01-15',
            ];
            $events[] = $event;
        }

        foreach ($allAppointments as $appointment) {
            $constraint = [
                'start' => Carbon::parse($appointment->date_time)->format('Y-m-d') . 'T' . Carbon::parse($appointment->date_time)->format('H:i:s'),
                'end' => Carbon::parse($appointment->date_time)->format('Y-m-d') . 'T' . Carbon::parse($appointment->date_time)->addMinutes(30)->format('H:i:s'),
            ];

            $constraints[] = $constraint;
        }

        return view('livewire.admin.appointment.index', [
            'events' => $events,
            'constraints' => $constraints,
        ]);
    }
}
