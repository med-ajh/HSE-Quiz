<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video',
        'image',
    ];

    // Each quiz can have many questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
