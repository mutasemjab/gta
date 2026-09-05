<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    protected $table = 'catalog_items';

    protected $fillable = [
        'meta_label_ar', 'meta_label_en', 'title_ar', 'title_en',
        'description_ar', 'description_en', 'file_ar', 'file_en',
        'order_index', 'is_active',
    ];

    protected $casts = [
        'order_index' => 'integer',
        'is_active' => 'boolean',
    ];
}
