<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocationProject;
use App\Models\CategoryProject;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'location_id',
        'category_id',
        'status',
        'contract',
        'start_date',
        'end_date',
        'priority',
    ];

    /**
     * Get the location associated with the project.
     */
    public function projectLocation()
    {
        return $this->hasOne(LocationProject::class, 'id', 'location_id');
    }

    /**
     * Get the category associated with the project.
     */
    public function projectCategory()
    {
        return $this->hasOne(CategoryProject::class, 'id', 'category_id');
    }

    /**
     * Get the transaction that owns the project.
     */
    public function projectTransaction()
    {
        return $this->belongsTo(Transaction::class, 'id', 'project_id');
    }
}
