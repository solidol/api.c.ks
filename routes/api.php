<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckerController;
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



Route::post('/login', [LoginController::class, 'apiLogin'])->name('login');



Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/student/lessons/{lesson}', [LessonController::class, 'now'])->name('api.lessons.now.show');
    Route::post('/student/lessons/presents/store', [PresentController::class, 'store'])->name('api.lessons.present.store');

    Route::get('/users/profile/my', [UserController::class, 'showMy']);
    
    Route::post('/checker/moodle',[CheckerController::class, 'moodle']);
    
});









