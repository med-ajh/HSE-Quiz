<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function showRegistrationForm()
    {
        return view('contractor.registration');
    }

    // Step 2: Handle contractor registration
    public function register(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'te_id' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
        ]);

        // Store contractor's details in the database
        $contractor = Contractor::create($request->all());

        // Store contractor in session
        session(['contractor' => $contractor]);

        // Redirect to formation list page
        return redirect()->route('contractor.formations');
    }


    // Step 3: List formations (quizzes)
    public function listFormations()
    {
        if (!session()->has('contractor')) {
            // Redirect to registration if contractor data is not present
            return redirect()->route('contractor.registration');
        }

        $formations = Quiz::all(); // Get all formations (quizzes)
        return view('contractor.formations', compact('formations'));
    }

    // Step 4: Show video before the quiz
    public function showVideo($quizId)
    {
        if (!session()->has('contractor')) {
            // Redirect to registration if contractor data is not present
            return redirect()->route('contractor.registration');
        }

        $quiz = Quiz::findOrFail($quizId); // Find the selected quiz
        return view('contractor.video', compact('quiz'));
    }

    // Step 5: Show the quiz
    public function showQuiz($quizId, $questionNumber = 1)
    {
        if (!session()->has('contractor')) {
            // Redirect to registration if contractor data is not present
            return redirect()->route('contractor.registration');
        }

        $quiz = Quiz::findOrFail($quizId); // Find the selected quiz
        $questions = $quiz->questions; // Get all questions for the quiz

        if ($questionNumber > $questions->count()) {
            return redirect()->route('contractor.result', $quizId); // Redirect to result if all questions are answered
        }

        $question = $questions[$questionNumber - 1]; // Get the current question

        return view('contractor.quiz', compact('quiz', 'question', 'questionNumber'));
    }

    // Step 6: Handle quiz submission
    public function submitQuiz(Request $request, $quizId, $questionNumber)
    {
        $request->validate([
            'answer' => 'required'
        ]);

        // Store answers in session
        $answers = session('quiz_answers', []);
        $answers[$quizId][$questionNumber] = $request->input('answer');
        session(['quiz_answers' => $answers]);

        // Redirect to next question or result
        return redirect()->route('contractor.quiz', [$quizId, $questionNumber + 1]);
    }

    // Step 7: Show result page
    public function showResult($quizId)
    {
        if (!session()->has('contractor') || !session()->has('quiz_answers')) {
            return redirect()->route('contractor.registration');
        }

        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions;
        $answers = session('quiz_answers')[$quizId];

        // Calculate score
        $score = 0;
        foreach ($questions as $index => $question) {
            if ($answers[$index + 1] === $question->correct_option) {
                $score++;
            }
        }

        $passed = $score >= 6;

        // Update contractor's formations if passed
        if ($passed) {
            $contractor = session('contractor');
            $formations = $contractor->formations_passed ? explode(',', $contractor->formations_passed) : [];
            $formations[] = $quiz->title;
            $contractor->formations_passed = implode(',', $formations);
            $contractor->save();
        }

        return view('contractor.result', compact('quiz', 'score', 'passed'));
    }

    // Step 8: Finish and show summary
    public function finish()
    {
        if (!session()->has('contractor')) {
            // Redirect to registration if contractor data is not present
            return redirect()->route('contractor.registration');
        }

        $contractor = session('contractor');
        $formations = $contractor->formations_passed ? explode(',', $contractor->formations_passed) : [];

        return view('contractor.finish', compact('contractor', 'formations'));
    }
}
