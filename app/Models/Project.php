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

            Storage::disk('public')->delete($project->thumbnail);
            Storage::disk('public')->delete($project->banner);

            if ($project->gallery) {
                foreach ($project->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
        });
        static::updating(function ($project) {
            if ($project->isDirty('thumbnail')) {
                Storage::disk('public')->delete(
                    $project->getOriginal('thumbnail')
                );
            }
            if ($project->isDirty('banner')) {
                Storage::disk('public')->delete(
                    $project->getOriginal('banner')
                );
            }
        });
    }
}