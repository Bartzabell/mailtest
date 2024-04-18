<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{

    use Actions;
    public $serviceId;
    public $name;
    public $price;
    public $duration;
    public $description;

    public $rules = [
        'name' => 'required|regex:/^[\s\w-]*$/|unique:services',
        'price' => 'required|integer|min:0',
        'duration' => 'required|integer|min:1',
    ];

    public function mount(Service $service)
    {

        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->price = $service->price;
        $this->duration = $service->duration;
        $this->description = $service->description;
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

        $this->validate();

        try {
            DB::beginTransaction();

            $service = Service::where('id', $this->serviceId)->first();
            $service->name = $this->name;
            $service->price = $this->price;
            $service->duration = $this->duration;
            $service->description = $this->description;

            if ($service->save()) {
                DB::commit();

                $this->dialog()->success(
                    $title = "Saved Succesfully",
                    $description = "Service was saved."
                );

                return redirect('/services');
            } else {
                DB::rollBack();
                $this->dialog([
                    $title = "Saving Failed",
                    $description = "Service was not saved"
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
        return view('livewire.admin.services.edit');
    }
}
