<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HssePlan extends Model
{
    protected $table = 'hsse_plans';

    protected $fillable = [
        'name',
        'unit',
        'category',
        'pic',
        'start_date',
        'end_date',
        'location',
        'status',
        'progress',
        'target',
        'description',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'progress' => 'integer',
    ];
}
