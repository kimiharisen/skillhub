<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;


// Redirect homepage to participants list
Route::get('/', function () {
    return redirect()->route('participants.index');
});

// Resource routes for participants and courses
Route::resource('participants', ParticipantController::class);
Route::resource('courses', CourseController::class);
// Enrollments: manage participant <-> course registrations
Route::post('participants/{participant}/enrollments', [EnrollmentController::class, 'store'])
    ->name('participants.enrollments.store');

Route::delete('participants/{participant}/enrollments/{course}', [EnrollmentController::class, 'destroy'])
    ->name('participants.enrollments.destroy');
