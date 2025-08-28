<?php
namespace App\Services;

use App\Models\LogActivity;

class LogActivityService
{
    public static function add($activity)
    {
         LogActivity::create([
            'user_id'   => auth()->id(),
            'activity'  => $activity,
            'ip_address'=> request()->ip(),
            'device'    => request()->header('User-Agent'),
        ]);
    }
}
