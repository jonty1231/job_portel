<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\CandidateController;

Route::prefix('candidates')->group(function () {
  
    Route::post('/', [CandidateController::class, 'store']);
    Route::get('/{id}', [CandidateController::class, 'show']); 
    Route::put('/{id}', [CandidateController::class, 'update']); 
    Route::delete('/{id}', [CandidateController::class, 'destroy']);
});

Route::apiResource('employers', EmployerController::class);