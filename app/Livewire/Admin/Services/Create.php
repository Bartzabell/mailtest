<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{
    use Actions;
    public $name;
    public $price;
    public $minutesTake;
    public $description;

    public $rules = [
        'name' => 'required|regex:/^[\s\w-]*$/|unique:services',
        'price' => 'required|integer|min:0',
        'minutesTake' => 'required|integer|min:1',
    ];

    public function createService()
    {

        $this->validate();

        try {
            DB::beginTransaction();

            $service = new Service();
            $service->name = $this->name;
            $service->price = $this->price;
            $service->duration = $this->minutesTake;
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
        return view('livewire.admin.services.create');
    }
}
