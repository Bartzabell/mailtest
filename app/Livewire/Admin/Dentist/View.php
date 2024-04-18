<?php

namespace App\Livewire\Admin\Dentist;

use App\Models\DentistsData;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class View extends Component
{
    use Actions;
    public $dentistData;
    public $user;
    public $availableDays;
    public $availableStart;
    public $availableEnd;


    public function mount(DentistsData $user)
    {
        // $this->user = $user;
        $this->dentistData = $user;
        $this->user = User::where('id', $user->user_id)->first();
        // $this->servicePanels = null;
    }

    public function render()
    {
        return view('livewire.admin.dentist.view');
    }
}
