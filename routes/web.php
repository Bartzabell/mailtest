<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

//Calendar Controller
use App\Http\Controllers\FullCalendarController;

//Home Page
use App\Livewire\Index as LandingPage;

//Login
use App\Livewire\Login\Login as Login;

//Register
use App\Livewire\User\Registration\Index as Register;

//User
use App\Livewire\User\Index as UserIndex;

//Controller
use App\Http\Controllers\LoginController;

//Dentist
use App\Livewire\Dentist\Dashboard as DentistDashboard;

//Admin
use App\Livewire\Admin\Dashboard\Index as Dashboard;

use App\Livewire\Admin\Users\Index as AdminIndex;
use App\Livewire\Admin\Users\Edit as AdminEdit;
use App\Livewire\Admin\Users\Log as UserLog;

use App\Livewire\Admin\Appointment\Index as AppointmentIndex;
use App\Livewire\Admin\Appointment\Create as AppointmentCreate;
use App\Livewire\Admin\Appointment\Edit as AppointmentEdit;

use App\Livewire\Admin\Patient\Index as PatientIndex;
use App\Livewire\Admin\Patient\Create as PatientCreate;
use App\Livewire\Admin\Patient\View as PatientView;
use App\Livewire\Admin\Patient\Edit as PatientEdit;

use App\Livewire\Admin\Dentist\Index as DentistIndex;
use App\Livewire\Admin\Dentist\Create as DentistCreate;
use App\Livewire\Admin\Dentist\Edit as DentistEdit;
use App\Livewire\Admin\Dentist\View as DentistView;

use App\Livewire\Admin\Services\Index as ServiceIndex;
use App\Livewire\Admin\Services\Edit as ServiceEdit;
use App\Livewire\Admin\Services\Create as CreateService;

use App\Livewire\Admin\Services\Discount\Index as ServiceDiscount;

use App\Livewire\Admin\OtherSettings\Index as SettingsIndex;
use App\Livewire\Admin\OtherSettings\Create as ClinicInformationCreate;
use App\Livewire\Admin\OtherSettings\Messages\Index as MessageIndex;

use App\Http\Controllers\ToothController;
use App\Http\Controllers\VerificationController;
use App\Livewire\SampleLanding as SampleLanding;
Route::get('/sample', SampleLanding::class)->name('sample');
Route::get('/dentistDashboard', DentistDashboard::class)->name('dentistDashboard');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$adminMiddleware = 'can:full-access';
$userMiddleware = 'can:limited-access';

// landing page
Route::middleware(['guest'])->group(function () {
    // Define your login and registration routes here
    Route::get('/', LandingPage::class)->name('index');
});

//login controller route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//Register route
Route::get('/register', Register::class)->name('register');
Route::post('/register', [Register::class, 'register']);

// Calendar Try
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::post('/calendar/cancel', [CalendarController::class, 'cancel'])->name('calendar.cancel');

Route::get('fullcalendar', [FullCalendarController::class, 'index']);
Route::post('fullcalendarAjax', [FullCalendarController::class, 'ajax']);
Route::get('fullcalendarAjax', [FullCalendarController::class, 'ajax']);

Route::middleware(['auth', 'verified', 'inactivity', $adminMiddleware])->group(function () {

    // Dashboard
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', Dashboard::class)->name('index');
        // Route::get('/pending', Pending::class)->name('pending');
        // Route::get('/create', Create::class)->name('create');
        // Route::get('/edit/{user}', Edit::class)->name('edit');

    });

    // Appoinments
    Route::prefix('appointment')->name('appointment.')->group(function () {
        Route::get('/', AppointmentIndex::class)->name('index');
        Route::get('/create', AppointmentCreate::class)->name('create');
        Route::get('/edit/{appointment}', AppointmentEdit::class)->name('edit');
        // Route::get('/pending', Pending::class)->name('pending');

        // Route::get('/edit/{user}', Edit::class)->name('edit');

    });

    // Patient
    Route::prefix('patient')->name('patient.')->group(function () {
        Route::get('/', PatientIndex::class)->name('index');
        Route::get('/create', PatientCreate::class)->name('create');
        Route::get('/view/{user}', PatientView::class)->name('view');
        Route::get('/edit/{user}', PatientEdit::class)->name('edit');


        // Route::get('/pending', Pending::class)->name('pending');

        // Route::get('/edit/{user}', Edit::class)->name('edit');

    });

    // Dentist
    Route::prefix('dentist')->name('dentist.')->group(function () {
        Route::get('/', DentistIndex::class)->name('index');
        Route::get('/create', DentistCreate::class)->name('create');
        Route::get('/edit/{user}', DentistEdit::class)->name('edit');
        Route::get('/view/{user}', DentistView::class)->name('view');
    });

    // All User
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', AdminIndex::class)->name('index');
        Route::get('/edit/{user}', AdminEdit::class)->name('edit');
        Route::get('/log', UserLog::class)->name('log');
        // Route::get('/pending', Pending::class)->name('pending');
        // Route::get('/create', Create::class)->name('create');


    });

    // All Services
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', ServiceIndex::class)->name('index');
        Route::get('/discounts', ServiceDiscount::class)->name('discounts');
        Route::get('/create', CreateService::class)->name('create');
        Route::get('/edit/{service}', ServiceEdit::class)->name('edit');
        // Route::get('/create', CreateService::class)->name('create');
        // Route::get('/pending', Pending::class)->name('pending');
        // Route::get('/edit/{user}', Edit::class)->name('edit');

    });

    // Other Settings
    Route::prefix('other-settings')->name('other-settings.')->group(function () {
        Route::get('/', SettingsIndex::class)->name('index');
        Route::get('/create', ClinicInformationCreate::class)->name('create');
        Route::get('/message', MessageIndex::class)->name('message');
        // Route::get('/discounts', ServiceDiscount::class)->name('discounts');
        // Route::get('/create', CreateService::class)->name('create');
        // Route::get('/edit/{service}', ServiceEdit::class)->name('edit');
        // Route::get('/create', CreateService::class)->name('create');
        // Route::get('/pending', Pending::class)->name('pending');
        // Route::get('/edit/{user}', Edit::class)->name('edit');

    });
});

Route::middleware(['auth', 'verified','inactivity', $userMiddleware])->group(function () {
    //user
    Route::prefix('user-account')->name('user-account.')->group(function () {
        Route::get('/', UserIndex::class)->name('index');
    });
});

Route::get('/tooth', [ToothController::class, 'show'])->name('tooth');

Route::get('email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'ensureEmailIsVerified'])->name('verification.notice');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

