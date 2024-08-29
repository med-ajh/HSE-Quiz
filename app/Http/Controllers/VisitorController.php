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
            // Redirect to registration if visitor data is not  
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

    // Show roles page
    public function showRoles()
    {
        return view('visitor.roles');
    }


    // Handle quiz question submission
    public function submitQuestion(Request $request, $questionNumber)
    {
        $request->validate([
            'answer' => 'required'
        ]);

        // Store answers in session
        $answers = session('answers', []);
        $answers[$questionNumber] = $request->input('answer');
        session(['answers' => $answers]);

        // Redirect to next question or result
        if ($questionNumber < 10) {
            return redirect()->route('visitor.question', ['questionNumber' => $questionNumber + 1]);
        } else {
            return redirect()->route('visitor.result');
        }
    }



    public function showQuestion($questionNumber)
{
    $questions = [
        1 => ['text' => 'What personal protective equipment is required to enter the factory?', 'options' => [
            'A' => 'Safety shoes, safety glasses and safety vest',
            'B' => 'Gloves and earplugs',
            'C' => 'All previous answers'
        ], 'image' => asset('images/te.png')],
        2 => ['text' => 'Can you enter the factory without completing the “Safety Induction” training?', 'options' => [
            'A' => 'Yes',
            'B' => 'No',
            'C' => 'Only if you are accompanied by a staff member'
        ],'image' => asset('images/te.png')],
        3 => ['text' => 'If you know someone, can you bring them into the factory without having completed “Safety Induction” training?', 'options' => [
            'A' => 'Yes',
            'B' => 'No',
            'C' => 'Yes, if wearing personal protective equipment'
        ],'image' => asset('images/te.png')],
        4 => ['text' => 'What do these pictograms mean?', 'options' => [
            'A' => 'Electrical danger',
            'B' => 'Chemical hazard',
            'C' => 'Risk of falling'
        ],'image' => asset('images/v4.png')],
        5 => ['text' => 'What is the correct behavior in this picture?', 'options' => [
            'A' => 'Person A',
            'B' => 'Person B',
            'C' => 'Both'
        ],'image' => asset('images/v5.png')],
        6 => ['text' => 'What should you do first if you see a fire in the factory?', 'options' => [
            'A' => 'Use a fire extinguisher',
            'B' => 'Evacuate immediately',
            'C' => 'Contact the fire brigade'
        ],'image' => asset('images/te.png')],
        7 => ['text' => 'What safety behaviors should be adopted in the factory?', 'options' => [
            'A' => 'Running to save time',
            'B' => 'Walking slowly and carefully while respecting safety zones',
            'C' => 'Ignoring safety instructions'
        ],'image' => asset('images/te.png')],
        8 => ['text' => 'Where should hazardous waste be disposed of?', 'options' => [
            'A' => 'In regular garbage cans',
            'B' => 'In special containers for hazardous waste',
            'C' => 'Anywhere'
        ],'image' => asset('images/te.png')],
        9 => ['text' => 'What should you do if you see damaged safety equipment?', 'options' => [
            'A' => 'Continue to use it',
            'B' => 'Report it immediately',
            'C' => 'Fix it myself'
        ],'image' => asset('images/te.png')],
        10 => ['text' => 'How should you react in an emergency?', 'options' => [
            'A' => 'Panic and run',
            'B' => 'Follow evacuation procedures and safety instructions',
            'C' => 'Ignore the alarm and continue working'
        ],'image' => asset('images/te.png')],
    ];

    // Check if the question number is valid
    if (!array_key_exists($questionNumber, $questions)) {
        // Redirect to the first question if the number is invalid
        return redirect()->route('visitor.question', ['questionNumber' => 1]);
    }

    $question = $questions[$questionNumber];
    return view('visitor.question', [
        'questionNumber' => $questionNumber,
        'questionText' => $question['text'],
        'options' => $question['options'],
        'questionImage' => $question['image']

    ]);
}


        public function showResult()
    {
        if (!session()->has('visitor') || !session()->has('answers')) {
            // Redirect to registration if visitor data or answers are not present
            return redirect()->route('visitor.registration');
        }

        // Answers and correct answers
        $answers = session('answers');
        $correctAnswers = [
            1 => 'A',
            2 => 'B',
            3 => 'B',
            4 => 'B',
            5 => 'B',
            6 => 'B',
            7 => 'B',
            8 => 'B',
            9 => 'B',
            10 => 'B'
        ];

        // Calculate score
        $score = 0;
        foreach ($correctAnswers as $questionNumber => $correctAnswer) {
            if (isset($answers[$questionNumber]) && $answers[$questionNumber] === $correctAnswer) {
                $score++;
            }
        }

        // Determine stars based on score
        $stars = 0;
        if ($score >= 6) $stars = 1;
        if ($score >= 8) $stars = 2;
        if ($score === 10) $stars = 3;

        return view('visitor.result', [
            'visitor' => session('visitor'),
            'score' => $score,
            'stars' => $stars
        ]);
    }
}
