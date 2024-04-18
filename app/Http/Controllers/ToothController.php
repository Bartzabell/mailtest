<?php

// app/Http/Controllers/ToothController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToothController extends Controller
{
    public function show()
    {
        return view('components.teeth');
    }
}
