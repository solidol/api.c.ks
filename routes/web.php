<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('start');
})->name('start');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/helpers/api/v1.0', [HelpController::class, 'api1_0'])->name('helpers.api.1_0');
});



Auth::routes([
    'register' => false,
    // Registration Routes...
    'reset' => false,
    // Password Reset Routes...
    'verify' => false,
    // Email Verification Routes...
]);

