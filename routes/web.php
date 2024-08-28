<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

// Language and role selection
Route::get('/', function () {
    return view('language');
})->name('language');

Route::get('/set-language/{lang}', function ($lang) {
    // Store the selected language in session
    session(['locale' => $lang]);
    return redirect()->route('role-selection');
})->name('set-language');

Route::get('/role-selection', function () {
    return view('role-selection');
})->name('role-selection');

// Visitor routes
Route::get('/visitor/registration', [VisitorController::class, 'showRegistrationForm'])->name('visitor.registration');
Route::post('/visitor/register', [VisitorController::class, 'register'])->name('visitor.register');
Route::get('/visitor/formation', [VisitorController::class, 'showFormation'])->name('visitor.formation');
Route::get('/visitor/video', [VisitorController::class, 'showVideo'])->name('visitor.video');
Route::get('/visitor/roles', [VisitorController::class, 'showRoles'])->name('visitor.roles');

// Route for displaying questions with optional questionNumber
Route::get('/visitor/question/{questionNumber?}', [VisitorController::class, 'showQuestion'])->name('visitor.question');

// Route for submitting answers
Route::post('/visitor/submit-question/{questionNumber}', [VisitorController::class, 'submitQuestion'])->name('visitor.submit-question');

// Route for showing the result
Route::get('/visitor/result', [VisitorController::class, 'showResult'])->name('visitor.result');
