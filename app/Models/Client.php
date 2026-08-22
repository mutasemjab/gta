<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['name', 'logo', 'order_index', 'is_active'];

    protected $casts = [
        'order_index' => 'integer',
        'is_active' => 'boolean',
    ];
}
