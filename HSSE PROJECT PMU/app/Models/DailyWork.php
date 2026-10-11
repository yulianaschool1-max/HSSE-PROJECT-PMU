<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyWork extends Model
{
    protected $fillable = [
        'name',
        'unit',
        'category',
        'start_date',
        'end_date',
        'location',
        'executor',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }
}
