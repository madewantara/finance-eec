<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'transaction_id',
        'name',
    ];

    /**
     * Get the transaction that owns the files.
     */
    public function projectFiles()
    {
        return $this->belongsTo(Transaction::class, 'id');
    }
}
