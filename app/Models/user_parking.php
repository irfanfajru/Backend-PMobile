<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_parking extends Model
{
    use HasFactory;
    protected $table = 'user_parking';
    protected $fillable = [
        'park_id',
        'user_id',
        'type',
        'checkin_time',
        'checkout_time',
        'cost',
        'status',
    ];
}
