<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('language-selection');
})->name('language.selection');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/information', function () {
    return view('information');
})->name('information');

Route::get('/start', function () {
    return view('start'); // Create a start view as needed
})->name('start');

Route::get('/switch-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        Session::put('locale', $lang);
    }
    return redirect()->route('welcome');
})->name('language.switch');

// Route to display the identification form
Route::get('/identification', [FormController::class, 'showForm'])->name('form.show');

// Route to handle form submission
Route::post('/submit-form', [FormController::class, 'submitForm'])->name('form.submit');



route::get('/category', [FormController::class, 'showCategory'])->name('category.show');
Route::post('/choose-role', [FormController::class, 'chooseRole'])->name('category.choose');

Route::get('/contractor-quiz', function () {
    return view('contractor-quiz');
})->name('contractor.quiz');

Route::get('/contractor-quiz/{formation}', function ($formation) {
    // Validate and handle redirection based on formation
    $validFormations = ['general', 'electrical', 'height', 'loto', 'guarding'];

    if (in_array($formation, $validFormations)) {
        return view('contractor-quiz-form', ['formation' => $formation]);
    }

    abort(404);
})->name('contractor.quiz.show');

Route::get('/visitor-quiz', function () {
    return view('visitor-quiz');
})->name('visitor.quiz');
Route::post('/visitor-quiz', [VisitorQuizController::class, 'submitQuiz'])->name('visitor.quiz.submit');

