<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_infos';

    protected $fillable = [
        'phone', 'email',
        'address_ar', 'address_en',
        'hours_ar', 'hours_en',
    ];
}
