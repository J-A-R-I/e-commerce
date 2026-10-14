<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[Fillable(['user_id', 'name', 'email', 'phone', 'slug', 'description', 'is_active'])]
class Store extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('store_logo')
            ->singleFile()
            ->useDisk('public');

        $this->addMediaCollection('store_banner')
            ->singleFile()
            ->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('store_logo', 'store_banner')
            ->width(400)
            ->height(400)
            ->nonQueued();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
