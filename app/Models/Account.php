<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'referral',
        'name',
        'category',
        'is_active',
    ];

    /**
     * Get the transaction that owns the account.
     */
    public function accountTransaction()
    {
        return $this->belongsTo(Transaction::class, 'id', 'referral_id');
    }
}
