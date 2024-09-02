<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\FormationController;

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
Route::get('/visitor/question/{questionNumber?}', [VisitorController::class, 'showQuestion'])->name('visitor.question');
Route::post('/visitor/submit-question/{questionNumber}', [VisitorController::class, 'submitQuestion'])->name('visitor.submit-question');
Route::get('/visitor/result', [VisitorController::class, 'showResult'])->name('visitor.result');


// Visitor contractor php artisan storage:link
Route::get('/contractor/register', [ContractorController::class, 'showRegistrationForm'])->name('contractor.registration');
Route::post('/contractor/register', [ContractorController::class, 'register'])->name('contractor.register');


Route::get('/contractor/formations', [ContractorController::class, 'showFormations'])->name('contractor.formations');
Route::get('/contractor/formation/{formationId}/video', [ContractorController::class, 'showVideo'])->name('contractor.video');
Route::get('/contractor/formation/{formationId}/quiz', [ContractorController::class, 'showQuiz'])->name('contractor.quiz');
Route::post('/contractor/formation/{formationId}/quiz', [ContractorController::class, 'submitQuiz'])->name('contractor.submitQuiz');
Route::get('/contractor/finish', [ContractorController::class, 'finish'])->name('contractor.finish');
