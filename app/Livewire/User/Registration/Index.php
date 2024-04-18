<?php

namespace App\Livewire\User\Registration;

use App\Models\PatientsData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Index extends Component
{

    use Actions;
    public $step;
    public $role;

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

    public $existingMedicalCondition;
    public $otherExistingMedicalCondition;


    public $rules = [
        'firstName' => 'required|regex:/^[\pL\s]+$/u',
        'middleName' => 'nullable|regex:/^[\pL\s]+$/u',
        'lastName' => 'required|regex:/^[\pL\s]+$/u',
        'birthdate' => 'required',
        'sex' => 'required|in:female,male',
        'phoneNumber' => 'numeric|min:11',
        'email' => 'required|email|unique:users',
        'provinceId' => 'required',
        'cityId' => 'required',
        'barangayId' => 'required',
        // 'password' => 'min:8'
    ];

    public function mount()
    {
        $this->step = 1;
    }

    public function back()
    {
        $this->step -= 1;
    }

    public function step2()
    {
        $this->validate();

        try {
            $this->step = 2;
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function createPatient()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $user = new User();
            $user->email = $this->email;
            if ($this->password != null){
                $user->password = Hash::make($this->password);
            } elseif($this->password == null){
                $user->password = Hash::make($this->lastName);
            }
            $user->status = 0; // Set status to 0 (not verified) initially
            $user->role = 'user';

            // Check if the user model implements MustVerifyEmail
            // if ($user instanceof MustVerifyEmail) {
            //     // Send email verification notification
            //     $user->sendEmailVerificationNotification();

            //     // Redirect the user to the email verification notice page
            //     return Redirect::route('verification.notice');
            // }

            // Save the user
            $user->save();

            event(new Registered($user)); // Fire the Registered event

            // Proceed with saving patient data...

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
            $patientData->existing_medical_condition = collect($this->existingMedicalCondition)->implode(', ');
            if ($this->otherExistingMedicalCondition !== null) {
                $patientData->existing_medical_condition = $patientData->existing_medical_condition . ", " . $this->otherExistingMedicalCondition;
            }

            if ($patientData->save()) {
                DB::commit();

                Auth::login($user);

                $this->dialog()->success(
                    $title = "Saved Successfully",
                    $description = "Patient Information was saved."
                );

                    return redirect('user-account');
                }else{
                    DB::rollBack();
                    $this->dialog([
                        $title = "Saving Failed",
                        $description = "Patient Information was not saved"
                    ]);
                }
        }catch(\Throwable $th){
            DB::rollBack();
            dd($th); // Handle exceptions appropriately
        }
    }
    public function render()
    {
        return view('livewire.user.registration.index');
    }
}
