<?php

namespace App\Livewire\Admin\OtherSettings;

use App\Models\ClinicInformation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{

    use Actions;
    public $name;
    public $content;
    public $type;

    public $rules = [
        'content' => 'required',
        'type' => 'required'
    ];

    public function createContent()
    {

        $this->validate();

        try {
            DB::beginTransaction();

            $content = new ClinicInformation();
            $content->name = $this->name;
            $content->content = $this->content;
            $content->type = $this->type;

            if($content->save()){
                DB::commit();

                $this->dialog()->success(
                    $title = "Saved Succesfully",
                    $description = "Content was saved."
                );

                return redirect('/other-settings');

            }else{
                DB::rollBack();

                $this->dialog([
                    $title = "Saving Unsuccesful",
                    $description = "Service was not saved."
                ]);

                return redirect('/services');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            DD($th);
        }
    }

    public function render()
    {
        return view('livewire.admin.other-settings.create');
    }
}
