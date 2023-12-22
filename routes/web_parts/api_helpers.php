<?php

use App\Http\Controllers\HelpController;

Route::group(['middleware' => 'auth'], function () {

    Route::controller(HelpController::class)->group(function () {
    Route::get('/helpers/api/{page}', 'show_api')->name('helpers.api.show');
    });
});