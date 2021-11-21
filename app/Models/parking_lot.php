<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parking_lot extends Model
{
    use HasFactory;
    protected $table = 'parking_lot';
    protected $fillable = [
        'name',
        'location',
        'latitied',
        'longitude',
        'car_price',
        'bike_price',
        'car_slot',
        'bike_slot',
        'operational',
        'status'
    ];
}
