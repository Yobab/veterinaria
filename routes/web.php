<?php

use App\Http\Controllers\AllergyController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you permission register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::middleware(['auth'])->group(function () {
    // Patients Routes
    Route::get('patients', [PatientController::class, 'index'])->middleware(['permission:view-patients'])->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'])->middleware(['permission:create-patients'])->name('patients.create');
    Route::post('patients', [PatientController::class, 'store'])->middleware(['permission:create-patients'])->name('patients.store');
    Route::get('patients/{patient}', [PatientController::class, 'show'])->middleware(['permission:view-patients'])->name('patients.show');
    Route::get('patients/{patient}/edit', [PatientController::class, 'edit'])->middleware(['permission:edit-patients'])->name('patients.edit');
    Route::put('patients/{patient}', [PatientController::class, 'update'])->middleware(['permission:edit-patients'])->name('patients.update');
    Route::delete('patients/{patient}', [PatientController::class, 'destroy'])->middleware(['permission:delete-patients'])->name('patients.destroy');
    Route::get('patientsPdf/{patient}', [PatientController::class, 'showPdf'])->middleware(['permission:view-patients'])->name('patients.showPdf');

    // Dates Routes
    Route::get('dates', [DateController::class, 'index'])->middleware(['permission:view-dates'])->name('dates.index');
    Route::get('dates/create', [DateController::class, 'create'])->middleware(['permission:create-dates'])->name('dates.create');
    Route::post('dates', [DateController::class, 'store'])->middleware(['permission:create-dates'])->name('dates.store');
    Route::get('dates/{date}', [DateController::class, 'show'])->middleware(['permission:view-dates'])->name('dates.show');
    Route::get('dates/{date}/edit', [DateController::class, 'edit'])->middleware(['permission:edit-dates'])->name('dates.edit');
    Route::put('dates/{date}', [DateController::class, 'update'])->middleware(['permission:edit-dates'])->name('dates.update');
    Route::delete('dates/{date}', [DateController::class, 'destroy'])->middleware(['permission:delete-dates'])->name('dates.destroy');

    // Treatments Routes
    Route::get('treatments', [TreatmentController::class, 'index'])->middleware(['permission:view-treatments'])->name('treatments.index');
    Route::get('treatments/create', [TreatmentController::class, 'create'])->middleware(['permission:create-treatments'])->name('treatments.create');
    Route::post('treatments', [TreatmentController::class, 'store'])->middleware(['permission:create-treatments'])->name('treatments.store');
    Route::get('treatments/{treatment}', [TreatmentController::class, 'show'])->middleware(['permission:view-treatments'])->name('treatments.show');
    Route::get('treatments/{treatment}/edit', [TreatmentController::class, 'edit'])->middleware(['permission:edit-treatments'])->name('treatments.edit');
    Route::put('treatments/{treatment}', [TreatmentController::class, 'update'])->middleware(['permission:edit-treatments'])->name('treatments.update');
    Route::delete('treatments/{treatment}', [TreatmentController::class, 'destroy'])->middleware(['permission:delete-treatments'])->name('treatments.destroy');

    // Diseases Routes
    Route::get('diseases', [DiseaseController::class, 'index'])->middleware(['permission:view-diseases'])->name('diseases.index');
    Route::get('diseases/create', [DiseaseController::class, 'create'])->middleware(['permission:create-diseases'])->name('diseases.create');
    Route::post('diseases', [DiseaseController::class, 'store'])->middleware(['permission:create-diseases'])->name('diseases.store');
    Route::get('diseases/{disease}', [DiseaseController::class, 'show'])->middleware(['permission:view-diseases'])->name('diseases.show');
    Route::get('diseases/{disease}/edit', [DiseaseController::class, 'edit'])->middleware(['permission:edit-diseases'])->name('diseases.edit');
    Route::put('diseases/{disease}', [DiseaseController::class, 'update'])->middleware(['permission:edit-diseases'])->name('diseases.update');
    Route::delete('diseases/{disease}', [DiseaseController::class, 'destroy'])->middleware(['permission:delete-diseases'])->name('diseases.destroy');

    // Allergies Routes
    Route::get('allergies', [AllergyController::class, 'index'])->middleware(['permission:view-allergies'])->name('allergies.index');
    Route::get('allergies/create', [AllergyController::class, 'create'])->middleware(['permission:create-allergies'])->name('allergies.create');
    Route::post('allergies', [AllergyController::class, 'store'])->middleware(['permission:create-allergies'])->name('allergies.store');
    Route::get('allergies/{allergy}', [AllergyController::class, 'show'])->middleware(['permission:view-allergies'])->name('allergies.show');
    Route::get('allergies/{allergy}/edit', [AllergyController::class, 'edit'])->middleware(['permission:edit-allergies'])->name('allergies.edit');
    Route::put('allergies/{allergy}', [AllergyController::class, 'update'])->middleware(['permission:edit-allergies'])->name('allergies.update');
    Route::delete('allergies/{allergy}', [AllergyController::class, 'destroy'])->middleware(['permission:delete-allergies'])->name('allergies.destroy');

    // Roles Routes
    Route::get('roles', [RoleController::class, 'index'])->middleware(['permission:view-roles'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->middleware(['permission:create-roles'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->middleware(['permission:create-roles'])->name('roles.store');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->middleware(['permission:edit-roles'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->middleware(['permission:edit-roles'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->middleware(['permission:delete-roles'])->name('roles.destroy');

    // Users Routes
    Route::get('users', [UserController::class, 'index'])->middleware(['permission:view-users'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->middleware(['permission:create-users'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->middleware(['permission:create-users'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->middleware(['permission:edit-users'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->middleware(['permission:edit-users'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware(['permission:delete-users'])->name('users.destroy');
});
