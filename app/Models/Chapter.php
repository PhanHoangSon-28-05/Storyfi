<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'number_chapter',
        'name',
        'content',
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
