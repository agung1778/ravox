<?php

namespace App\Models;
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
}
