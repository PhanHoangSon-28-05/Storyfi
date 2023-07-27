<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
use SoftDeletes;//dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé

    protected $fillable = [
        'icon',
        'name',
    ];

    public function stories(): BelongsToMany
    {
        return $this->belongsToMany(Story::class, 'category_story', 'category_id', 'story_id');
    }
}
