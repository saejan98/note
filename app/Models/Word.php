<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'word',
        'word_type',
        'mean',
        'example',
        'note_id',
        'spelling',
        'recipe',
        'using',
        'identification_sign',
        'status',
    ];
}
