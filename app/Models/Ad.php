<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['name', 'description', 'price', 'photos'];
    
    protected $casts = [
        'photos' => 'array',
    ];
}