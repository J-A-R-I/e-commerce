<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'name', 'email', 'phone', 'slug', 'description', 'logo', 'banner', 'is_active'])]

class Store extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
