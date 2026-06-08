<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'banner',
        'gallery',
        'excerpt',
        'content',
        'category',
        'is_featured',
        'status',
        'views',
        'published_at',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    protected static function booted()
    {
        static::deleting(function ($post) {

            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            if ($post->banner) {
                Storage::disk('public')->delete($post->banner);
            }

            if ($post->gallery) {
                foreach ($post->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
        });

        static::updating(function ($post) {

            if ($post->isDirty('thumbnail')) {
                Storage::disk('public')->delete(
                    $post->getOriginal('thumbnail')
                );
            }

            if ($post->isDirty('banner')) {
                Storage::disk('public')->delete(
                    $post->getOriginal('banner')
                );
            }
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}