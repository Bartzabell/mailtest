<?php

namespace App\Livewire\Admin\Dentist;

use App\Models\DentistsData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{

    use Actions;
    public $firstName;
    public $middleName;
    public $lastName;
    public $extensionName;
    public $email;
    public $licenseNumber;
    public $password;


    public $rules = [
        'firstName' => 'required|regex:/^[\pL\s]+$/u',
        'middleName' => 'nullable|regex:/^[\pL\s]+$/u',
        'lastName' => 'required|regex:/^[\pL\s]+$/u',
        'email' => 'required|email',
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
            $user->role = 'admin';
            $user->status = 1;

            if($user->save()){

                $dentistData = new DentistsData();
                $dentistData->user_id = $user->id;
                $dentistData->last_name = $this->lastName;
                $dentistData->first_name = $this->firstName;
                $dentistData->middle_name = $this->middleName;
                $dentistData->extension_name = $this->extensionName;
                $dentistData->license_number = $this->licenseNumber;

                // dd($userData);
                if($dentistData->save()){
                    DB::commit();

                    $this->dialog()->success(
                        $title = "Saved Succesfully",
                        $description = "Dentist Information was saved."
                    );

                    return redirect('/dentist');
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
        return view('livewire.admin.dentist.create');
    }
}
