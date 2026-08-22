<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'chip_label', 'code', 'name_ar', 'name_en',
        'description_ar', 'description_en',
        'spec_label_ar', 'spec_label_en', 'spec_value',
        'order_index', 'is_active',
    ];

    protected $casts = [
        'order_index' => 'integer',
        'is_active' => 'boolean',
    ];
}
