<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Http\JsonResponse;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Appointment::where('date_time', '>=', $request->start)
                ->where('date_time', '<=', $request->end)
                ->with('services') // Eager load services relationship
                ->get(['id', 'user_id', 'date_time as start', 'date_time as end', 'status', 'concern']);

            // Include service name in the title
            foreach ($data as $appointment) {
                $serviceNames = $appointment->services->pluck('name')->implode(', '); // Get service names
                $appointment->title = $serviceNames;

            }

            return response()->json($data);
        }

        return view('fullcalendar');

    }

    public function ajax(Request $request): JsonResponse
    {
        switch ($request->type) {
            case 'add':
                $existingEvent = Appointment::where('user_id', $request->user_id)
                    ->where('date_time', $request->start)
                    ->first();

                if ($existingEvent) {
                    return response()->json(['error' => 'Overlapping events are not allowed.'], 400);
                }

                $event = Appointment::create([
                    'user_id' => $request->user_id,
                    'date_time' => $request->start,
                    'status' => 'scheduled',
                    'concern' => $request->concern,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Appointment::find($request->id)->delete();
                return response()->json($event);
                break;

            case 'getAppointmentDetails':
                $appointment = Appointment::find($request->id);
                $serviceNames = $appointment->services->pluck('name')->implode(', '); // Get service names
                $appointment->title = $serviceNames;
                return response()->json($appointment);
                break;

            default:
                // handle other cases if needed
                break;
        }
    }
}
