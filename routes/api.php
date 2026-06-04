<?php

use App\Http\Controllers\Api\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth.basic')->get('/user',function(Request $request){
    return $request->user();
});



Route::apiResource('patient',PatientController::class);
