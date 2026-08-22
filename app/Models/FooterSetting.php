<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $table = 'footer_settings';

    protected $fillable = [
        'about_ar', 'about_en',
        'copyright_ar', 'copyright_en',
        'tagline_ar', 'tagline_en',
        'facebook_url', 'instagram_url', 'linkedin_url', 'whatsapp_url',
    ];
}
