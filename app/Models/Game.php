<?php

namespace App\Models;

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
}
