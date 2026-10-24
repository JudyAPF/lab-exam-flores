<?php

use App\Http\Controllers\Api\TokenController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public: exchange email + password for a token
Route::post('/tokens/create', [TokenController::class, 'store']);

// Protected: needs the header "Authorization: Bearer <token>"
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/students', function () {
        return Student::with('course')->latest()->get();
    });
});
