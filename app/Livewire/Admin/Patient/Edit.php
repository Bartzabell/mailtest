<?php

namespace App\Livewire\Admin\Patient;

use App\Models\PatientsData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use PhpParser\Builder\Use_;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;
    public $userId;
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

    public function mount(PatientsData $user){

        $this->userId = $user->user_id;
        $userTable = User::where('id', $this->userId)->first();
        // dd($this->userId);
        $this->lastName = $user->last_name;
        $this->firstName = $user->first_name;
        $this->middleName = $user->middle_name;
        $this->extensionName = $user->extension_name;
        $this->birthdate = $user->birthdate;
        $this->age = Carbon::parse($user->birthdate)->diff(Carbon::now())->format('%y years');
        $this->sex = $user->sex;
        $this->email = $userTable->email;
        $this->phoneNumber = $user->phone_number;
        $this->provinceId = $user->province_id;
        $this->cityId = $user->city_id;
        $this->barangayId = $user->barangay_id;
    }

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
    ];

    public function saveConfirmation(): void
    {
        // use a full syntax
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'saveEdit',
                // 'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                // 'method' => 'cancel',
            ],
        ]);
    }

    public function saveEdit(){

        $this->validate();
        // dd($this->user->id);

        try{
            DB::beginTransaction();

            $user = User::find($this->userId);

            // This is temporary role just to test saving
            $user->role = 'user';

            if($user->save()){

                $patientsData = PatientsData::where('user_id', $user->id)->first();
                $patientsData->user_id = $user->id;
                $patientsData->last_name = $this->lastName;
                $patientsData->first_name = $this->firstName;
                $patientsData->middle_name = $this->middleName;
                $patientsData->extension_name = $this->extensionName;
                $patientsData->phone_number = $this->phoneNumber;
                $patientsData->birthdate = $this->birthdate;
                $patientsData->sex = $this->sex;
                $patientsData->province_id = $this->provinceId;
                $patientsData->city_id = $this->cityId;
                $patientsData->barangay_id = $this->barangayId;

                if($patientsData->save()){
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

    public function render()
    {
        return view('livewire.admin.patient.edit');
    }
}
