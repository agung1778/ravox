<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'email',
        'phone',
        'logo',
        'github',
        'instagram',
        'linkedin',
        'youtube',
        'whatsapp',
        'seo_title',
        'seo_description',
    ];
}
