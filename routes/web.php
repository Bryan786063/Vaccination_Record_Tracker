<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HealthWorkerController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VaccinationRecordController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/test', [TestController::class, 'index']);

// Route::[resources]('/[uri]', [[Controller Class Here]::class,' [Controller Method]'])
    Route::resource('batches', BatchController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('health_workers', HealthWorkerController::class);
    Route::resource('vaccines', VaccineController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('vaccination_records', VaccinationRecordController::class);
});

// Auth routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Route::[resources]('/[uri]', [[Controller Class Here]::class,' [Controller Method]'])

