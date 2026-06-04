<?php

use App\Http\Controllers\Api\PatientController;
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
Route::get('/paciente/edit/{paciente}',[PatientController::class,'edit'])->name('paciente.edit');
Route::put('/paciente/update/{paciente}',[PatientController::class,'update'])->name('paciente.update');
Route::delete('/paciente/destroy/{paciente}',[PatientController::class,'destroy'])->name('paciente.destroy');

