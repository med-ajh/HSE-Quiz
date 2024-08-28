<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'question_id',
        'answer_id',
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
