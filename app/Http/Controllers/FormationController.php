<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    public function index()
    {
        // Fetch all quizzes
        $quizzes = Quiz::all();

        // Return a view with quizzes
        return view('formations.index', compact('quizzes'));
    }

    /**
     * Show the form to create a new quiz.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('formations.create');
    }

    /**
     * Store a newly created quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // Max 20MB
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $videoPath = $request->hasFile('video') ? $this->storeFile($request->file('video'), 'videos') : null;
        $imagePath = $request->hasFile('image') ? $this->storeFile($request->file('image'), 'images') : null;

        $quiz = Quiz::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video' => $videoPath,
            'image' => $imagePath,
        ]);

        return redirect()->route('formation.addQuestions', ['quizId' => $quiz->id])
                         ->with('success', 'Quiz created successfully. Now add questions.');
    }

    protected function storeFile($file, $directory)
    {
        return $file->store($directory, 'public');
    }




    public function destroy($id)
{
    $quiz = Quiz::findOrFail($id);

    // Delete associated questions, if necessary
    $quiz->questions()->delete();

    // Delete the video file if it exists
    if ($quiz->video) {
        Storage::disk('public')->delete($quiz->video);
    }

    // Delete the image file if it exists
    if ($quiz->image) {
        Storage::disk('public')->delete($quiz->image);
    }

    // Delete the quiz
    $quiz->delete();

    return redirect()->route('formation.index')->with('success', 'Quiz deleted successfully.');
}



    /**
     * Show the form to add questions to a quiz.
     *
     * @param  int  $quizId
     * @return \Illuminate\View\View
     */
    public function addQuestions($quizId)
    {
        return view('formations.add-questions', compact('quizId'));
    }

    /**
     * Store questions for a quiz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $quizId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeQuestions(Request $request, $quizId)
    {
        $request->validate([
            'questions.*.question_text' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.correct_option' => 'required|in:A,B,C',
            'questions.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        foreach ($request->input('questions') as $key => $questionData) {
            $imagePath = null;

            if ($request->hasFile("questions.{$key}.image")) {
                $image = $request->file("questions.{$key}.image");
                $imagePath = $image->store('questions_images', 'public');
            } else {
                // Set the default image path
                $imagePath = 'questions_images/te.png';
            }

            Question::updateOrCreate(
                ['quiz_id' => $quizId, 'id' => $questionData['id'] ?? null],
                array_merge($questionData, ['image' => $imagePath])
            );
        }

        return redirect()->route('formation.index')->with('success', 'Questions added successfully.');
    }

    /**
     * Store a file in the specified directory.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $directory
     * @return string
     */

}
