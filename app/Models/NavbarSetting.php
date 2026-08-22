<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavbarSetting extends Model
{
    protected $table = 'navbar_settings';

    protected $fillable = [
        'logo', 'brand_name_ar', 'brand_name_en',
    ];
}
