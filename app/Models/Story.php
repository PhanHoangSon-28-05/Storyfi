<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes; //dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé

    protected $table = 'stories';

    protected $fillable = [
        'image',
        'name',
        'summary',
        'method',
        'content',
        'title_id',
        'slug'
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
        return $this->belongsToMany(User::class, 'user_stories', 'story_id', 'user_id')->withPivot('point', 'status');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'story_id');
    }
}
