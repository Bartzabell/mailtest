<?php

namespace App\Livewire\Login;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class Login extends Component
{
    public function render()
    {
        return view('livewire.login.login');
    }
}
