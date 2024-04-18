<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\PatientDentalRecord;
use App\Models\PatientsData;
use App\Models\PhilippineBarangays;
use App\Models\PhilippineCities;
use App\Models\PhilippineProvinces;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Throwable;

class Index extends Component
{
    use Actions;

    public $user;
    public $addPatientRecord = false;
    public $patientData;
    public $sortedRecords;
    public $barangay;
    public $city;
    public $province;

    public $appointments;
    public $events;
    public $constraints;
    // public $event;
    // public $users;
    // public $services;
    // public $serviceId = [];
    // public $status = "scheduled";
    public $concern;

    public $date;
    public $time;
    public $dateTime;

    public $minHour = 8;
    public $maxHour = 17 - 1;
    public $interval = 30;


    public $rules = [
        'dateTime' => 'required|date|after_or_equal: . now()->addHours(1)->toDateString()',
        'status' => 'required',
        'concern' => 'nullable|string',
        // 'serviceId' => 'required|exists:services,id',
    ];

    // public function mount()
    // {
    //     // $this->user = Auth::user();
    //     // dd($this->user);

    // }

    public function render()
    {

        // $this->selectedTime = 'Select Time';
        // for calendar appoinments
        $this->user = Auth::user();
        $this->appointments = Appointment::where('user_id', $this->user->id)->where('status', 'scheduled')->get();
        $allAppointments = Appointment::where('status', 'scheduled')->get();

        $this->events = array();
        $constraints = array();

        foreach ($this->appointments as $appointment) {

            $event = [
                'id' => $appointment->id,
                'title' => $appointment->concern,
                'start' => Carbon::parse($appointment->date_time)->format('Y-m-d') . 'T' . Carbon::parse($appointment->date_time)->format('H:i:s'),
                'end' => Carbon::parse($appointment->date_time)->format('Y-m-d') . 'T' . Carbon::parse($appointment->date_time)->addHour()->format('H:i:s'),
            ];

            $this->events[] = $event;
        }

        foreach ($allAppointments as $appointment) {
            $constraint = [
                'start' => Carbon::parse($appointment->date_time)->format('Y-m-d') . 'T' . Carbon::parse($appointment->date_time)->format('H:i:s'),
                'end' => Carbon::parse($appointment->date_time)->format('Y-m-d') . 'T' . Carbon::parse($appointment->date_time)->addHour()->format('H:i:s'),
            ];

            $this->constraints[] = $constraint;
        }

        // for patientData
        $this->patientData = PatientsData::where('user_id', $this->user->id)->first();
        $patientRecords = PatientDentalRecord::where('patient_id', $this->patientData->id)->get();
        // dd($patientRecords);

        // Still doesnt work. sorting of records
        $this->sortedRecords = $patientRecords->map(function ($record) {
            $record->date_time_rendered = optional($record->pdrDetail)->date_time_rendered ?? null;
            return $record;
        })->sortByDesc('date_time_rendered')->values();
        // dd($this->sortedRecords);

        $this->barangay = PhilippineBarangays::where('id', $this->patientData->barangay_id)->first();
        $this->city = PhilippineCities::where('id', $this->patientData->city_id)->first();
        $this->province = PhilippineProvinces::where('id', $this->patientData->province_id)->first();


        return view('livewire.user.index', [
            'users' => Auth::user(),
            'events' => $this->events,
            'constraints' => $constraints,
        ]);
    }

}
