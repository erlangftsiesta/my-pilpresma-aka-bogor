<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SystemPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'opened_time',
        'closed_time',
    ];

    protected $casts = [
        'opened_time' => 'datetime',
        'closed_time' => 'datetime',
    ];

    public static function isVotingOpen()
    {
        $period = self::latest()->first();
        
        if (!$period) {
            return false;
        }

        $now = Carbon::now();
        return $now->between($period->opened_time, $period->closed_time);
    }

    public static function getCurrentPeriod()
    {
        return self::latest()->first();
    }
}