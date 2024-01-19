<?php
use App\Http\Controllers\JournalController;

Route::controller(JournalController::class)->group(function () {

    Route::get('/journals', 'index')->name('journals.index');
    Route::get('/journals/{journal}', 'show')->name('journals.show');

});