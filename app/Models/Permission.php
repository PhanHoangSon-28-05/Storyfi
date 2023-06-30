<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
{
    use HasFactory;

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
