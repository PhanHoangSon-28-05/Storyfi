<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_chaper',
        'story_id',
        'name',
        'content',
    ];

    public function stories()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
