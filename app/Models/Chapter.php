<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chapter extends Model
{
    use HasFactory;
use SoftDeletes;//dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé

    protected $fillable = [
        'story_id',
        'number_chapter',
        'name',
        'sumary',
        'content',
        'slug'
    ];


    public function stories()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_stories', 'story_id', 'user_id');
    }
}
