<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $primaryKey = 'rating_id';
    protected $fillable = [
        'park_id',
        'user_id',
        'rate'
    ];
}
