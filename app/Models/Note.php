<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $topic
 * @property int $category_id
 * @property string $mean
 * @property int $status
 */
class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'topic',
        'category_id',
        'mean',
        'status'
    ];
}
