<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('visitor.registration');
    }

    // Handle the registration form submission
    public function register(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'te_id' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
        ]);

        // Store visitor's details in the database
        $visitor = Visitor::create($request->all());

        // Store visitor in session
        session(['visitor' => $visitor]);

        // Redirect to formation details page
        return redirect()->route('visitor.formation');
    }

    // Show the formation details page
    public function showFormation()
    {
        if (!session()->has('visitor')) {
            // Redirect to registration if visitor data is not present
            return redirect()->route('visitor.registration');
        }

        return view('visitor.formation');
    }

    // Show the video
    public function showVideo()
    {
        if (!session()->has('visitor')) {
            // Redirect to registration if visitor data is not present
            return redirect()->route('visitor.registration');
        }

        $locale = session('locale', 'en');
        $videoPath = ($locale == 'ar') ? asset('videos/visitor_ar.mp4') : asset('videos/visitor_en.mp4');

        return view('visitor.video', compact('videoPath'));
    }

    // Show the quiz questions
    public function showQuestions()
    {
        if (!session()->has('visitor')) {
            // Redirect to registration if visitor data is not present
            return redirect()->route('visitor.registration');
        }

        return view('visitor.questions');
    }

    // Handle the quiz submission
    public function submitQuestions(Request $request)
    {
        $request->validate([
            'question_1' => 'required',
            'question_2' => 'required',
            'question_3' => 'required',
            'question_4' => 'required',
        ]);

        // Normally, you would check answers and determine pass/fail status here
        // For simplicity, we're assuming the visitor passes

        return view('visitor.result', [
            'visitor' => session('visitor')
        ]);
    }

    public function showRoles()
{
    return view('visitor.roles');
}
}
