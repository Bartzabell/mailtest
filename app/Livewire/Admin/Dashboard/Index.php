<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Appointment;
use App\Models\PatientDentalRecord;
use App\Models\PatientsData;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;
    public $appointments;
    public $completed;
    public $scheduled;
    public $patients;
    public $males;
    public $females;
    public $minor;
    public $senior;
    public $adults;
    public $birthdate;
    public $age;
    public $monthlyRevenue;


    public function mount()
    {

        $this->patients = PatientsData::all();
        $this->appointments = Appointment::all();
        $this->completed = Appointment::where('status', 'completed')->get();
        $this->scheduled = Appointment::where('status', 'scheduled')->get();
        $this->males = PatientsData::where('sex', 'male')->get();
        $this->females = PatientsData::where('sex', 'female')->get();
        $patient = PatientsData::get('birthdate');

        $this->monthlyRevenue = PatientDentalRecord::sum('total_bill');
        // dd($this->monthlyRevenue);

        // for ($x = 1; $x >= $this->totalPatient; $x++) {

        //     // $this->age = Carbon::parse(PatientsData::where('id', $x)->first('birthdate'))->diff(Carbon::now())->format('%y years');
        // }
        // dd($patient);


        // dd($this->age);
    }

    public function render()
    {


        return view('livewire.admin.dashboard.index');
    }
}
