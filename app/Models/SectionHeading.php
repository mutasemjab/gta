<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionHeading extends Model
{
    protected $table = 'section_headings';

    protected $fillable = [
        'key', 'eyebrow_ar', 'eyebrow_en', 'title_ar', 'title_en',
        'description_ar', 'description_en',
    ];
}
