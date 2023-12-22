<?php

use Illuminate\Support\Facades\Route;


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

require_once __DIR__ . '/web_parts/api_helpers.php';

Route::get('/', function () {
    return view('start');
})->name('start');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');



Auth::routes([
    'register' => false,
    // Registration Routes...
    'reset' => false,
    // Password Reset Routes...
    'verify' => false,
    // Email Verification Routes...
]);

