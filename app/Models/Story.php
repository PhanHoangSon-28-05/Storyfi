<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'name',
        'name_other',
        'summary',
        'title_id'
    ];

    protected static function booted()
    {
        static::creating(function ($story) {
            $story->view = 0;
            $story->sum_chapter = 0;
        });
    }

    public function titles()
    {
        return $this->belongsTo(Title::class, 'title_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_story', 'story_id', 'category_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_stories', 'story_id', 'user_id')->withPivot('point');
    }
}
