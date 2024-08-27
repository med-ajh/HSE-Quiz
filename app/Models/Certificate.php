<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Certificate extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'certificates';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
    ];

    /**
     * The visitors that belong to the certificate.
     */
    public function visitors(): BelongsToMany
    {
        return $this->belongsToMany(Visitor::class, 'visitor_certificate')
                    ->withTimestamps();
    }
}
