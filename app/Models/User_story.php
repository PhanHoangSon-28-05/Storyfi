<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_story extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'story_id', 'point', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user_story) {
            $user_story->point = 0;
        });
    }
}
