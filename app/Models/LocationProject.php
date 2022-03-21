<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class LocationProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'address',
        'latitude',
        'longitude',
    ];

    /**
     * Get the project that owns the category.
     */
    public function locationProject()
    {
        return $this->belongsTo(Project::class, 'location_id');
    }
}
