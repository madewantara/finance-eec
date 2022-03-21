<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MapUserRole;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the role associated with the map user role.
     */
    public function role()
    {
        return $this->hasMany(MapUserRole::class);
    }
}
