<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// patient reference route
Route::get('patient-references', [Controller::class, 'patientReferences'])->name('patient.references');

// doctor reference route
Route::get('doctor-references', [Controller::class, 'doctorReferences'])->name('doctor.references');

//service reference route
Route::get('service-references', [Controller::class, 'serviceReferences'])->name('service.references');

// provinces reference route
Route::get('province-references', [Controller::class, 'provinceReferences'])->name('province.references');
// cities reference route
Route::get('city-references', [Controller::class, 'cityReferences'])->name('city.references');
// barangays reference route
Route::get('barangay-references', [Controller::class, 'barangayReferences'])->name('barangay.references');
