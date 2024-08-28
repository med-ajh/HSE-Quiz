<?php
namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'image' => 'nullable|image',
            'answers' => 'required|array',
            'answers.*.text' => 'required|string',
            'answers.*.is_correct' => 'required|boolean'
        ]);

        $question = new Question();
        $question->text = $request->text;

        if ($request->hasFile('image')) {
            $question->image = $request->file('image')->store('questions_images', 'public');
        }

        $question->save();

        foreach ($request->answers as $answerData) {
            $answer = new Answer($answerData);
            $question->answers()->save($answer);
        }

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }
}
