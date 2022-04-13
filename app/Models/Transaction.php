<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\Project;
use App\Models\TransactionFile;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'date',
        'token',
        'description',
        'referral_id',
        'debit',
        'credit',
        'pic',
        'paid_to',
        'project_id',
        'type',
        'is_active',
        'status',
        'category',
    ];

    /**
     * Get the account associated with the transaction.
     */
    public function transactionAccount()
    {
        return $this->hasMany(Account::class, 'id', 'referral_id');
    }

    /**
     * Get the project associated with the transaction.
     */
    public function transactionProject()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * Get the files associated with the transaction.
     */
    public function transactionFiles()
    {
        return $this->hasMany(TransactionFile::class, 'transaction_id', 'uuid');
    }
}
