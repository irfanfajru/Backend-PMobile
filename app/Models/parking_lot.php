<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parking_lot extends Model
{
    use HasFactory;
    protected $table = 'parking_lot';
    protected $primaryKey = 'park_id';
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
    public function facilities()
    {
        return $this->hasMany(parking_facilities::class, 'park_id', 'park_id');
    }
    public function rating()
    {
        return $this->hasMany(rating::class, 'park_id', 'park_id');
    }
}
