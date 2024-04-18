<?php

namespace App\Livewire;

use App\Models\ClinicInformation;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{

    use Actions;
    public $subtitle;
    public $services;
    public $abouts;

    public $firstName;
    public $middleName;
    public $lastName;
    public $extensionName;
    public $birthdate;
    public $age;
    public $sex;
    public $email;
    public $phoneNumber;
    public $provinceId;
    public $cityId;
    public $barangayId;
    public $password;


    // public $rules = [
    //     'firstName' => 'required|regex:/^[\pL\s]+$/u',
    //     'middleName' => 'nullable|regex:/^[\pL\s]+$/u',
    //     'lastName' => 'required|regex:/^[\pL\s]+$/u',
    //     'birthdate' => 'required',
    //     'sex' => 'required|in:female,male',
    //     'phoneNumber' => 'required|min:11',
    //     'email' => 'required|email',
    //     'provinceId' => 'required',
    //     'cityId' => 'required',
    //     'barangayId' => 'required'
    //     // 'password' => 'required|min:8'
    // ];


    // public function createPatient()
    // {

    //     $this->validate();
    // }

    public function render()
    {
        $this->subtitle = ClinicInformation::where('type', 'subtitle')->first();
        $this->services = ClinicInformation::where('type', 'services')->get();
        $this->abouts = ClinicInformation::where('type', 'about')->get();
        // dd($this->subtitle);

        return view('livewire.index');
    }

}
