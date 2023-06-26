<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'group'
    ];
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'role__permissions', 'role_id', 'permission_id');
    }
}