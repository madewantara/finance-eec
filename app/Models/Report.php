<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'start_date',
        'end_date',
        'report_type',
        'type',
        'status',
        'is_active',
    ];
}
