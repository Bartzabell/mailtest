<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\User;
use App\Models\Appointment;
use App\Models\AppointmentService;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{
    use Actions;

    public $users;
    public $services;
    public $user_id;
    public $service_id = [];
    public $date_time;
    public $status = "scheduled";
    public $concern;

    public function mount()
    {
        $this->users = User::all();
        $this->services = Service::all();
    }

    public function render()
    {
        return view('livewire.admin.appointment.create');
    }

    public function createAppointment()
    {
        $this->validate([
            'date_time' => [
                'required',
                'date',
            ],
            'status' => 'required',
            'concern' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id', // Make sure the selected user is valid
        ]);

        try {
            DB::beginTransaction();

            $validatedData = [
                'user_id' => $this->user_id,
                'date_time' => $this->date_time,
                'status' => $this->status,
                'concern' => $this->concern,
                'service_id' => $this->service_id,
            ];

            $appointment = Appointment::create($validatedData);
            $appointment->services()->attach($validatedData['service_id']);


            $this->dialog()->success(
                $title = 'Success',
                $description = 'Appointment created successfully!'
            );

            DB::commit();

            return redirect()->route('appointment.index');

        } catch (\Throwable $th) {
            DB::rollBack();

            $this->dialog()->error(
                $title = 'Error',
                $description = $th->getMessage()
            );
        }
    }


}
