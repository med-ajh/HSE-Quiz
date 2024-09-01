<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id',           // Foreign key to the quizzes table
        'question_text',      // The actual question
        'option_a',           // Option A
        'option_b',           // Option B
        'option_c',           // Option C
        'correct_option',     // Correct answer (A, B, or C)
        'image',             // Image URL related to the question
    ];

    // Each question belongs to a quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
