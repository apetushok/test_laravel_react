<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'city',
        'address',
        'stars',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
