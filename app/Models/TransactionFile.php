<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'category',
        'type',
        'name',
    ];

    /**
     * Get the transaction that owns the files.
     */
    public function fileTransaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'uuid');
    }
}
