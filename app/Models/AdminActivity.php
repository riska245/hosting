<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $table = 'admin_activities';

    protected $fillable = [
        'username',
        'activity',
        'description',
        'ip_address',
        'user_agent',
    ];
}
