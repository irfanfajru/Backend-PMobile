<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parking_facilities extends Model
{
    use HasFactory;
    protected $table = 'parking_facilities';
    protected $hidden = [
        'park_id',
        'fac_id',
        'created_at',
        'updated_at'
    ];
}
