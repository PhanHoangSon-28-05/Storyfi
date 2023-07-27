<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes; //dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé

    protected $fillable = [
        'user_id',
        'story_id',
        'content',
        'status'
    ];

    // protected $guarded = ['_token'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
            $comment->status = 0;
        });
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stories()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
