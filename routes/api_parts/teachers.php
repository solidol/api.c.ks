<?php
use App\Http\Controllers\TeacherController;

Route::controller(TeacherController::class)->group(function () {

    Route::get('/teachers', 'index')->name('teachers.index');
    Route::get('/teachers/my', 'indexMy')->name('teachers.index.my');
    Route::get('/teachers/avatar/{teacher}', 'avatar')->name('teachers.avatar');
    
});