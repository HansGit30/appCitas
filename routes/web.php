<?php

use App\Http\Controllers\Api\DiagnosisController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/google',[App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle']);
Route::get('/login/google/callback',[App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback']);



Route::get('/login/github', [LoginController::class, 'redirectToGithub']);
Route::get('/login/github/callback', [LoginController::class, 'handleGithubCallback']);

Route::middleware(['auth'])->get('/inicio', function(){
    return view('home');
});



Route::get('/paciente',[PatientController::class, 'listar'])->name('paciente');
Route::get('/paciente/create',[PatientController::class,'create'])->name('paciente.create');
Route::post('/paciente/store',[PatientController::class,'store'])->name('paciente.store');
Route::get('/paciente/edit/{patient}',[PatientController::class,'edit'])->name('paciente.edit');
Route::put('/paciente/update/{patient}',[PatientController::class,'update'])->name('paciente.update');
Route::delete('/paciente/destroy/{patient}',[PatientController::class,'destroy'])->name('paciente.destroy');


Route::get('/medico',[DoctorController::class, 'listar'])->name('medico');
Route::get('/medico/create',[DoctorController::class,'create'])->name('medico.create');
Route::post('/medico/store',[DoctorController::class,'store'])->name('medico.store');
Route::get('/medico/edit/{doctor}',[DoctorController::class,'edit'])->name('medico.edit');
Route::put('/medico/update/{doctor}',[DoctorController::class,'update'])->name('medico.update');
Route::delete('/medico/destroy/{doctor}',[DoctorController::class,'destroy'])->name('medico.destroy');



Route::get('/cita',[QuoteController::class, 'listar'])->name('cita');
Route::get('/cita/create',[QuoteController::class,'create'])->name('cita.create');
Route::post('/cita/store',[QuoteController::class,'store'])->name('cita.store');
Route::get('/cita/edit/{appointment}',[QuoteController::class,'edit'])->name('cita.edit');
Route::put('/cita/update/{appointment}',[QuoteController::class,'update'])->name('cita.update');
Route::delete('/cita/destroy/{appointment}',[QuoteController::class,'destroy'])->name('cita.destroy');



Route::get('/diagnostico',[DiagnosisController::class, 'listar'])->name('diagnostico');
Route::get('/diagnostico/create',[DiagnosisController::class,'create'])->name('diagnostico.create');
Route::post('/diagnostico/store',[DiagnosisController::class,'store'])->name('diagnostico.store');
Route::get('/diagnostico/edit/{diagnosis}',[DiagnosisController::class,'edit'])->name('diagnostico.edit');
Route::put('/diagnostico/update/{diagnosis}',[DiagnosisController::class,'update'])->name('diagnostico.update');
Route::delete('/diagnostico/destroy/{diagnosis}',[DiagnosisController::class,'destroy'])->name('diagnostico.destroy');



Route::get('/tratamiento',[TreatmentController::class, 'listar'])->name('tratamiento');
Route::get('/tratamiento/create',[TreatmentController::class,'create'])->name('tratamiento.create');
Route::post('/tratamiento/store',[TreatmentController::class,'store'])->name('tratamiento.store');
Route::get('/tratamiento/edit/{treatment}',[TreatmentController::class,'edit'])->name('tratamiento.edit');
Route::put('/tratamiento/update/{treatment}',[TreatmentController::class,'update'])->name('tratamiento.update');
Route::delete('/tratamiento/destroy/{treatment}',[TreatmentController::class,'destroy'])->name('tratamiento.destroy');



Route::get('/medicamento',[MedicineController::class, 'listar'])->name('medicamento');
Route::get('/medicamento/create',[MedicineController::class,'create'])->name('medicamento.create');
Route::post('/medicamento/store',[MedicineController::class,'store'])->name('medicamento.store');
Route::get('/medicamento/edit/{medicine}',[MedicineController::class,'edit'])->name('medicamento.edit');
Route::put('/medicamento/update/{medicine}',[MedicineController::class,'update'])->name('medicamento.update');
Route::delete('/medicamento/destroy/{medicine}',[MedicineController::class,'destroy'])->name('medicamento.destroy');



