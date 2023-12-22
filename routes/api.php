<?php

use App\Http\Controllers\HelperController;
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



Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::group(['middleware' => ['auth:sanctum']], function () {

    require_once __DIR__ . '/api_parts/timetables.php';


    Route::get('/student/lessons/{lesson}', [LessonController::class, 'now'])->name('api.lessons.now.show');
    Route::post('/student/lessons/presents/store', [PresentController::class, 'store'])->name('api.lessons.present.store');

    Route::get('/users/profile/my', [UserController::class, 'showMy']);

    Route::post('/checker/moodle', [CheckerController::class, 'moodle']);


});









