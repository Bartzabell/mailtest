<?php

namespace App\Livewire\Admin\Dentist;

use App\Models\DentistsData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{

    use Actions;
    public $userId;
    public $firstName;
    public $middleName;
    public $lastName;
    public $extensionName;
    public $email;
    public $licenseNumber;
    public $password;


    public function mount(DentistsData $user)
    {
        // dd($user);
        $this->userId = $user->user_id;
        $userTable = User::where('id', $this->userId)->first();
        // dd($userTable);
        $this->lastName = $user->last_name;
        $this->firstName = $user->first_name;
        $this->middleName = $user->middle_name;
        $this->extensionName = $user->extension_name;
        $this->licenseNumber = $user->license_number;
        $this->email = $userTable->email;
    }

    public $rules = [
        'firstName' => 'required|regex:/^[\pL\s]+$/u',
        'middleName' => 'nullable|regex:/^[\pL\s]+$/u',
        'lastName' => 'required|regex:/^[\pL\s]+$/u',
        'email' => 'required|email',
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

    public function saveEdit()
    {

        $this->validate();
        // dd($this->user->id);

        try {
            DB::beginTransaction();

            $dentistData = DentistsData::where('user_id', $this->userId)->first();
            $user = User::where('id', $this->userId)->first();
            $dentistData->last_name = $this->lastName;
            $dentistData->first_name = $this->firstName;
            $dentistData->middle_name = $this->middleName;
            $dentistData->extension_name = $this->extensionName;
            $dentistData->license_number = $this->licenseNumber;
            $user->email = $this->email;


            if ($dentistData->save() && $user->save()) {
                DB::commit();

                $this->dialog()->success(
                    $title = "Saved Succesfully",
                    $description = "Dentist Information was saved."
                );

                return redirect('/dentist');
            } else {
                DB::rollBack();
                $this->dialog([
                    $title = "Saving Failed",
                    $description = "Dentist Information was not saved"
                ]);
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
        return view('livewire.admin.dentist.edit');
    }
}
