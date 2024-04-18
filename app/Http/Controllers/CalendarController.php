<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class CalendarController extends Controller
{
    use Actions;
    public $user;

    public function index()
    {
        $appointments = Appointment::all();
        $events = array();

        foreach ($appointments as $appointment) {

            $event = [
                'id' => $appointment->id,
                'title' => $appointment->concern,
                'start' => $appointment->date_time,
                'end' => '2024-01-15',
            ];
            $events[] = $event;
        }

        // dd($events);

        return view('calendar.index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $this->user = Auth::user();

        $request->validate([
            'title' => 'required|string'
        ]);

        $appointment = Appointment::create([
            'concern' =>  $request->title,
            'date_time' => $request->start_date,
            'status' => 'scheduled',
            'user_id' => $this->user->id,

        ]);

        return response()->json($appointment);
    }

    public function cancel(Request $request)
    {

        $appointment = Appointment::where('id', $request->eventId)
            ->update(['status' => 'canceled']);

        return response()->json($appointment);
    }
}
