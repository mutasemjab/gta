<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heroes';

    protected $fillable = [
        'eyebrow_ar', 'eyebrow_en',
        'heading_line1_ar', 'heading_line1_en',
        'heading_highlight_ar', 'heading_highlight_en',
        'heading_line2_ar', 'heading_line2_en',
        'lead_ar', 'lead_en',
        'primary_btn_link', 'secondary_btn_link',
        'strip_text',
    ];
}
