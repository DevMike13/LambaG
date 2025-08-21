<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySensorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'temperature',
        'humidity',
        'liquid_temp', 
        'alcohol',
        'pH_level',
        'brix',
        'liquid_level',
        'reading_date'
    ];
}
