<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;
use SoftDeletes;//dòng này để tự động thêm điều kiện delete_at = null vào câu query nhé

    protected $fillable = [
        'name',
        'display_name',
        'group'
    ];

    protected static function booted()
    {
        static::creating(function ($roles) {
            $roles->guard_name = 'web';
        });
    }
}
