<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class CategoryProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'category',
    ];

    /**
     * Get the project that owns the category.
     */
    public function categoryProject()
    {
        return $this->belongsTo(Project::class, 'category_id');
    }
}
