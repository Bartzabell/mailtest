<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Table\PatientTable;
use App\Models\DentistsData;
use App\Models\PatientsData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{

    use Actions;
    public $userId;
    public $user;
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
    public $role;
    public $status;
    public $licenseNumber;

    public $provinces;
    public $cities;
    public $barangays;
    public $password;

    public $rules;




    public function mount(User $user)
    {

        $this->userId = $user->id;
        if ($user->role == 'admin') {
            $this->user = DentistsData::where('user_id', $this->userId)->first();
        } elseif ($user->role == 'user') {
            $this->user = PatientsData::where('user_id', $this->userId)->first();
        }

        // dd($this->user);

        $this->lastName = $this->user->last_name;
        $this->firstName = $this->user->first_name;
        $this->middleName = $this->user->middle_name;
        $this->extensionName = $this->user->extension_name;
        $this->role = $user->role;
        $this->status = $user->status;
        $this->birthdate = $this->user->birthdate;
        $this->age = Carbon::parse($this->user->birthdate)->diff(Carbon::now())->format('%y years');
        $this->sex = $this->user->sex;
        $this->email = $user->email;
        $this->phoneNumber = $this->user->phone_number;
        $this->provinceId = $this->user->province_id;
        $this->cityId = $this->user->city_id;
        $this->barangayId = $this->user->barangay_id;
    }



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

    public function saveEdit()
    {

        if ($this->role == 'user') {
            $this->rules = [
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
        } elseif ($this->role == 'admin') {
            $this->rules = [
                'firstName' => 'required|regex:/^[\pL\s]+$/u',
                'middleName' => 'nullable|regex:/^[\pL\s]+$/u',
                'lastName' => 'required|regex:/^[\pL\s]+$/u',
                'email' => 'required|email',
            ];
        }

        $this->validate();
        // dd($this->user->id);

        try {
            DB::beginTransaction();

            $user = User::find($this->userId);
            $user->email = $this->email;
            $user->role = $this->role;
            $user->status = $this->status;
            if ($this->password == null) {
            } else {
                $user->password = Hash::make($this->password);
            }

            if ($user->save()) {

                if ($user->role == 'user') {
                    $this->user->last_name = $this->lastName;
                    $this->user->first_name = $this->firstName;
                    $this->user->middle_name = $this->middleName;
                    $this->user->extension_name = $this->extensionName;
                    $this->user->phone_number = $this->phoneNumber;
                    $this->user->birthdate = $this->birthdate;
                    $this->user->sex = $this->sex;
                    $this->user->province_id = $this->provinceId;
                    $this->user->city_id = $this->cityId;
                    $this->user->barangay_id = $this->cityId;
                } elseif ($user->role == 'admin') {
                    $this->user->last_name = $this->lastName;
                    $this->user->first_name = $this->firstName;
                    $this->user->middle_name = $this->middleName;
                    $this->user->extension_name = $this->extensionName;
                    $this->user->license_number = $this->licenseNumber;
                }

                if ($this->user->save()) {
                    DB::commit();

                    $this->dialog()->success(
                        $title = "Saved Succesfully",
                        $description = "Patient Information was saved."
                    );

                    return redirect('/user');
                } else {
                    DB::rollBack();
                    $this->dialog([
                        $title = "Saving Failed",
                        $description = "Patient Information was not saved"
                    ]);
                }
            }
        } catch (\Throwable $th) {
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
        return view('livewire.admin.users.edit');
    }
}
