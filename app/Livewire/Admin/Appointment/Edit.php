<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;

    public $appointmentId;
    public $users;
    public $services;
    public $user_id;
    public $service_id = [];
    public $date_time;
    public $status;
    public $concern;

    public function mount(Appointment $appointment)
    {
        $this->appointmentId = $appointment->id;
        $this->users = User::all();
        $this->services = Service::all();
        $this->user_id = $appointment->user_id;
        $this->service_id = $appointment->services->pluck('id')->toArray();
        $this->date_time = $appointment->date_time;
        $this->status = $appointment->status;
        $this->concern = $appointment->concern;
    }

    public $rules = [
        'date_time' => 'required|date',
        'status' => 'required',
        'concern' => 'nullable|string',
        'service_id' => 'required|array',
        'service_id.*' => 'exists:services,id',
        'user_id' => 'required|exists:users,id',
    ];

    public function saveConfirmation(): void
    {
        $this->dialog()->confirm([
            'title'       => 'Are you sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'saveEdit',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function saveEdit()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $appointment = Appointment::find($this->appointmentId);
            $appointment->user_id = $this->user_id;
            $appointment->date_time = $this->date_time;
            $appointment->status = $this->status;
            $appointment->concern = $this->concern;
            $appointment->save();

            $appointment->services()->sync($this->service_id);

            DB::commit();

            $this->dialog()->success(
                $title = 'Saved Successfully',
                $description = 'Appointment information was saved.'
            );

            return redirect('/appointment');
        } catch (\Throwable $th) {
            DB::rollBack();

            $this->dialog()->error(
                $title = 'Saving Failed',
                $description = $th->getMessage()
            );
        }
    }

    public function render()
    {
        return view('livewire.admin.appointment.edit');
    }
}
