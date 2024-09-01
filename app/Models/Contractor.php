<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'organization',
        'te_id',
        'purpose',
        'host',
        'formations_passed', // Stores formations passed by the contractor
    ];
}
