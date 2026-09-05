<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';

    protected $fillable = ['name', 'logo', 'order_index', 'is_active'];

    protected $casts = [
        'order_index' => 'integer',
        'is_active' => 'boolean',
    ];
}
