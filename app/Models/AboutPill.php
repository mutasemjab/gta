<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPill extends Model
{
    protected $table = 'about_pills';

    protected $fillable = ['name_ar', 'name_en', 'order_index'];

    protected $casts = ['order_index' => 'integer'];
}
