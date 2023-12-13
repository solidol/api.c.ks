<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PresentController;
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



Route::post('/login', [LoginController::class, 'apiLogin']);

Route::middleware('auth:sanctum')->get('/student/lessons/{lesson}', [LessonController::class, 'now'])->name('api.lessons.now.show');


Route::middleware('auth:sanctum')->post('/student/lessons/presents/store', [PresentController::class, 'store'])->name('api.lessons.present.store');






Route::middleware('auth:sanctum')->get('/users/profile/my', function (Request $request) {
    return response()->json(['user'=>\Auth::user()]);
});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
