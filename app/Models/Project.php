<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'category_ar', 'category_en', 'title_ar', 'title_en',
        'location_ar', 'location_en', 'size', 'image',
        'order_index', 'is_active',
    ];

    protected $casts = [
        'order_index' => 'integer',
        'is_active' => 'boolean',
    ];
}
