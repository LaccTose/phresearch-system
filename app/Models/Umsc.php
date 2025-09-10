<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umsc extends Model
{
    use HasFactory;

    protected $fillable = [
        'healthCenter', 'month', 'year',
        'reporterName', 'reporterPosition', 'reporterPhone',
        'people', 'times', 'linePeople', 'lineTimes',
        'othersSpecify', 'lineOthersSpecify'
    ];

    protected $casts = [
        'people' => 'array',
        'times' => 'array',
        'linePeople' => 'array',
        'lineTimes' => 'array',
    ];
}
