<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_sections';

    protected $fillable = [
        'eyebrow_ar', 'eyebrow_en',
        'title_ar', 'title_en',
        'lead_ar', 'lead_en',
        'paragraph1_ar', 'paragraph1_en',
        'paragraph2_ar', 'paragraph2_en',
        'badge_title', 'badge_text_ar', 'badge_text_en',
    ];
}
