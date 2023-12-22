<?php
use App\Http\Controllers\LessonSheduleController;

Route::controller(LessonSheduleController::class)->group(function () {

    Route::get('/lessons/shedule/replacements:{count?}', 'replacements')->name('lessons.shedule.replacements');
    Route::get('/lessons/shedule/replacements/checkrep', 'checkrep')->name('lessons.shedule.checkrep');
});