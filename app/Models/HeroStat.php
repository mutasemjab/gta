<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroStat extends Model
{
    protected $table = 'hero_stats';

    protected $fillable = [
        'label_ar', 'label_en', 'value', 'suffix', 'order_index',
    ];

    protected $casts = [
        'value' => 'integer',
        'order_index' => 'integer',
    ];
}
