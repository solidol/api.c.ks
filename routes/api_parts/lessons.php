<?php
use App\Http\Controllers\LessonController;

Route::controller(LessonController::class)->group(function () {

    Route::get('/lessons/{lesson}', 'show')->name('lessons.show');

});