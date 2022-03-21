<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class MapUserRole extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'role_id',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the user that owns the role.
     */
    public function userRole()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the map user role that owns the role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
