<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
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
        static::creating(function ($permissions) {
            $permissions->guard_name = 'web';
        });
    }
}
