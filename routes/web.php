<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\CourseController;

// Redirect homepage to participants list
Route::get('/', function () {
    return redirect()->route('participants.index');
});

// Resource routes for participants and courses
Route::resource('participants', ParticipantController::class);
Route::resource('courses', CourseController::class);