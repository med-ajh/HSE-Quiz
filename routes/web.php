<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
})->name('information'); // Add this line to define the route

Route::get('/start', function () {
    return view('start'); // Create a start view as needed
})->name('start');

Route::get('/switch-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        Session::put('locale', $lang);
    }
    return redirect()->route('welcome');
})->name('language.switch');



Route::get('/identification', function () {
    return view('identification');
})->name('identification.form');

Route::post('/submit-form', function () {
    // Handle form submission here
    return redirect()->route('identification.form')->with('status', 'Form submitted successfully!');
})->name('form.submit');
