<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'banner',
        'gallery',
        'description',
        'content',
        'category',
        'github_url',
        'demo_url',
        'tech_stack',
        'client_name',
        'is_featured',
        'status',
        'completed_at',
        'views',
    ];

    protected $casts = [

        'gallery' => 'array',

        'completed_at' => 'date',

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected static function booted()
{
    static::deleting(function ($project) {

        if (!empty($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        if (!empty($project->banner)) {
            Storage::disk('public')->delete($project->banner);
        }

        if (!empty($project->gallery) && is_array($project->gallery)) {
            foreach ($project->gallery as $image) {
                if (!empty($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
    });

    static::updating(function ($project) {

        if ($project->isDirty('thumbnail')) {

            $oldThumbnail = $project->getOriginal('thumbnail');

            if (!empty($oldThumbnail)) {
                Storage::disk('public')->delete($oldThumbnail);
            }
        }

        if ($project->isDirty('banner')) {

            $oldBanner = $project->getOriginal('banner');

            if (!empty($oldBanner)) {
                Storage::disk('public')->delete($oldBanner);
            }
        }
    });
}
}