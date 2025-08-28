<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LogActivity extends Model
{
     protected $table = 'log_activities';
     protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'activity',
        'ip_address',
        'device',
    ];
}
