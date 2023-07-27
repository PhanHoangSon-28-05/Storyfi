<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User_story extends Model
{
    use HasFactory;
use SoftDeletes;//dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé

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
