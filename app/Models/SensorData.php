<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $table = 'sensor_data';

    protected $fillable = [
        'incubator_code',
        'temperature',
        'humidity',
        'lamp_status',
        'turning_status',
        'turned_at',
        'next_turn_at',
    ];

    protected $casts = [
        'turned_at' => 'datetime',
        'next_turn_at' => 'datetime',
    ];
}
