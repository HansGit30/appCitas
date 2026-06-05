<?php

use App\Http\Controllers\Api\DiagnosisController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\TreatmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth.basic')->get('/user',function(Request $request){
    return $request->user();
});



Route::apiResource('patient',PatientController::class);
Route::apiResource('appointment',QuoteController::class);
Route::apiResource('doctor',DoctorController::class);
Route::apiResource('medication',MedicineController::class);
Route::apiResource('treatment',TreatmentController::class);
Route::apiResource('diagnosis',DiagnosisController::class);



