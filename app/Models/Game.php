<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Game extends Model
{
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'genre',
        'thumbnail',
        'description',
        'status',
        'download_url',
        'webgl_url',
        'banner',
        'gallery',
        'engine',
        'version',
        'youtube_url',
        'download_file',
        'webgl_path',
        'webgl_zip',
        'play_type',
        'featured',
        'views',
        'downloads',
        'plays',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::deleting(function ($game) {

            Storage::disk('public')->delete($game->thumbnail);
            Storage::disk('public')->delete($game->banner);
            Storage::disk('public')->delete($game->download_file);
            Storage::disk('public')->delete($game->webgl_zip);

            if ($game->gallery) {
                foreach ($game->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            if ($game->thumbnail) {
                Storage::disk('public')->delete($game->thumbnail);
            }
            if ($game->download_file) {
                Storage::disk('public')->delete($game->download_file);
            }
        });

        static::updating(function ($game) {
        if ($game->isDirty('thumbnail')) {
                Storage::disk('public')->delete(
                    $game->getOriginal('thumbnail')
                );
            }
            if ($game->isDirty('banner')) {
                Storage::disk('public')->delete(
                    $game->getOriginal('banner')
                );
            }
            if ($game->isDirty('download_file')) {
                Storage::disk('public')->delete(
                    $game->getOriginal('download_file')
                );
            }
            if ($game->isDirty('webgl_zip')) {
                Storage::disk('public')->delete(
                    $game->getOriginal('webgl_zip')
                );
            }
            if ($game->isDirty('gallery')) {
                $oldGallery = $game->getOriginal('gallery');
                $oldGallery = json_decode(
                    $oldGallery,
                    true
                ) ?? [];
                foreach ($oldGallery as $image) {
                    Storage::disk('public')
                        ->delete($image);
                }
            }
        });
    }
}
