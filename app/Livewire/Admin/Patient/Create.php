<?php

namespace App\Livewire\Admin\Patient;

use App\Models\PatientsData;
use App\Models\PhilippineBarangays;
use App\Models\PhilippineCities;
use App\Models\PhilippineProvinces;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

use function Laravel\Prompts\password;

class Create extends Component
{
    use Actions;
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

    public $provinces;
    public $cities;
    public $barangays;
    public $password;


    // public function mount (UsersData $userData){

    //     // $this->provinces = PhilippineProvinces::all();
    //     // $this->provinceCode = PhilippineProvinces::where('id', $userData->province_id)->value('province_code');
    //     // // dd($this->provinceCode);
    //     // $this->cities = PhilippineCities::where('province_code', $this->provinceCode)->get();
    //     // $this->cityCode = PhilippineCities::where('id', $userData->city_id)->value('city_municipality_code');
    //     // $this->barangays = PhilippineBarangays::where('city_municipality_code', $this->cityCode)->get();
    // }

    public $rules = [
        'firstName' => 'required|regex:/^[\pL\s]+$/u',
        'middleName' => 'nullable|regex:/^[\pL\s]+$/u',
        'lastName' => 'required|regex:/^[\pL\s]+$/u',
        'birthdate' => 'required',
        'sex' => 'required|in:female,male',
        'phoneNumber' => 'required|min:11',
        'email' => 'required|email',
        'provinceId' => 'required',
        'cityId' => 'required',
        'barangayId' => 'required'
        // 'password' => 'required|min:8'
    ];

    public function createPatient(){


        $this->validate();
        // dd($this->sex);

        try{
            DB::beginTransaction();

            $user = new User();
            $user->email = $this->email;
            if ($this->password != null){
                $user->password = Hash::make($this->password);
                // dd($user->password);
            }elseif($this->password == null){
                $user->password = Hash::make($this->lastName);
            }

            // This is temporary role just to test saving
            $user->role = 'user';
            $user->status = 1;

            if($user->save()){

                $patientData = new PatientsData();
                $patientData->user_id = $user->id;
                $patientData->last_name = $this->lastName;
                $patientData->first_name = $this->firstName;
                $patientData->middle_name = $this->middleName;
                $patientData->extension_name = $this->extensionName;
                $patientData->phone_number = $this->phoneNumber;
                $patientData->birthdate = $this->birthdate;
                $patientData->sex = $this->sex;
                $patientData->province_id = $this->provinceId;
                $patientData->city_id = $this->cityId;
                $patientData->barangay_id = $this->barangayId;

                // dd($userData);
                if($patientData->save()){
                    DB::commit();

                    $this->dialog()->success(
                        $title = "Saved Succesfully",
                        $description = "Patient Information was saved."
                    );

                    return redirect('/patient');
                }else{
                    DB::rollBack();
                    $this->dialog([
                        $title = "Saving Failed",
                        $description = "Patient Information was not saved"
                    ]);
                }}


        }catch(\Throwable $th){
            DB::rollBack();
            // $this->dialog([
            //     $title = "Saving Error",
            //     $description = $th,
            // ]);
            dd($th);
        }

    }

    // public function updatedBirthdate($value){

    //     $this->age = Carbon::parse($this->birthdate)->diff(Carbon::now())->format('%y years');
    // }


    // public function updatedProvinceCode($value){

    //     $this->cities = PhilippineCities::where('province_code', $value)->get();
    // }

    // public function updatedCityCode($value){

    //     $this->barangays = PhilippineBarangays::where('city_municipality_code', $value)->get();
    // }


    public function render()
    {
        return view('livewire.admin.patient.create');
    }
}
