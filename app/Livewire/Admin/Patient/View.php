<?php

namespace App\Livewire\Admin\Patient;

use App\Models\DentistsData;
use App\Models\PatientDentalRecord;
use App\Models\PatientsData;
use App\Models\PdrDetail;
use App\Models\PdrDetails;
use App\Models\PhilippineBarangays;
use App\Models\PhilippineCities;
use App\Models\PhilippineProvinces;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads; // Import the WithFileUploads trait
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

class View extends Component
{
    use Actions, WithFileUploads;
    public $user;
    public $patientData;
    public $userId;
    public $patientRecords;
    public $sortedRecords;
    public $barangay;
    public $city;
    public $province;

    public $dentistId;
    public $servicesId;
    public $allServices;
    public $dateTimeRendered;
    public $totalBill;
    // public $servicePanels;

    public $remark;
    public $image;

    public $addPatientRecord = false; // Add this line to declare the variable
    public $addServiceDetail;


    public function mount(PatientsData $user)
    {
        $this->user = User::where('id', $user->user_id)->first();
        // $this->user = $user;
        $this->userId = $user->id;
        $this->addPatientRecord = 0;
        $this->addServiceDetail = 0;
        // $this->servicePanels = null;
    }

    public function viewAddRecord()
    {
        $this->addPatientRecord = 1;
        $this->addPatientRecord = true;
    }

    public function viewAddServiceDetail()
    {
        $this->addServiceDetail = 1;
    }

    public function cancel()
    {
        $this->addPatientRecord = 0;
        $this->addPatientRecord = false;
    }

    public function convertToWebp($image)
    {
        return PdrDetail::make($image)->encode('webp', 99)->stream();
    }

    public function saveRecord()
    {

        // dd($this->servicePanels);
        try {
            DB::beginTransaction();

            $record = new PatientDentalRecord();
            $record->patient_id = $this->userId;
            $record->total_bill = 0;
            $record->dentist_id = $this->dentistId;

            if ($record->save()) {
                DB::commit();
                DB::beginTransaction();

                // dd(count($this->servicesId));
                for ($x = 0; $x < count($this->servicesId); $x++) {
                    $pdrDetails = new PdrDetail();
                    $pdrDetails->date_time_rendered = $this->dateTimeRendered;
                    // dd($pdrDetails->date_time_rendered);
                    $pdrDetails->pdr_id = $record->id;
                    $pdrDetails->service_id = $this->allServices[$x]->id;
                    $pdrDetails->image = $this->image;
                    $pdrDetails->price = $this->allServices[$x]->price;
                    // $pdrDetails->doctors_remark = $this->remark[$x];
                    $pdrDetails->doctors_remark = $this->remark;
                    $record->total_bill += $this->allServices[$x]->price;
                    // dd($record->total_bill);
                    // if ($this->image) {
                    //     // Store the uploaded image and get its path
                    //     $randomString = Str::random(40);
                    //     $name = $randomString . ".webp";
                    //     $filepath = "images/" . $name;
                    //     $webpImage = $this->convertToWebp($this->image);
                    //     Storage::disk("public")->put($filepath, $webpImage);
                    //     // $imagePath = $this->image->store('images', 'public');
                    //     $pdrDetails->images()->create([
                    //         "path" => $filepath,
                    //     ]);

                    //     // Save the image path to the database
                    //     // $post->image = $imagePath;
                    // }
                    if ($pdrDetails->save()) {
                        DB::commit();
                    } else {
                        DB::rollBack();
                    }
                }
                if ($pdrDetails->save() && $record->save()) {
                    $this->dialog()->success(
                        $title = "Saved Succesfully",
                        $description = "Patient Information was saved."
                    );

                    return redirect('/patient/view/'. $this->userId);
                } else {
                    $this->dialog()->success(
                        $title = "Saving Unsuccessful",
                        $description = "Patient Record was not saved."
                    );
                }
            } else {
                DB::rollBack();
            }
            // dd(count($this->servicesId));
        } catch (\Throwable $t) {
            DB::rollBack();
            dd($t);
        }
    }

    public function updatedServicesId($value)
    {

        if ($this->servicesId !== null) {
            $this->allServices = Service::whereIn('id', $this->servicesId)->get();
        } else {
            // Handle the case where $this->servicesId is null
        }
        // if ($value == null) {
        //     $this->servicePanels[0] = null;
        // } else {
        //     $this->servicePanels = $value;
        // }
        // dd($this->servicesId);
    }


    public function render()
    {
        $this->patientData = PatientsData::where('id', $this->userId)->first();
        $patientRecords = PatientDentalRecord::where('patient_id', $this->userId)->get();


        // Still doesnt work. sorting of records
        $this->sortedRecords = $patientRecords->map(function ($record) {
            $record->date_time_rendered = optional($record->pdrDetail)->date_time_rendered ?? null;
            return $record;
        })->sortByDesc('date_time_rendered')->values();
        // dd($this->sortedRecords);

        $this->barangay = PhilippineBarangays::where('id', $this->patientData->barangay_id)->first();
        $this->city = PhilippineCities::where('id', $this->patientData->city_id)->first();
        $this->province = PhilippineProvinces::where('id', $this->patientData->province_id)->first();
        // if ($this->servicesId !== null) {
        //     $this->allServices = Service::whereIn('id', $this->servicesId)->get();
        // } else {
        //     // Handle the case where $this->servicesId is null
        // }

        return view('livewire.admin.patient.view');
    }
}
