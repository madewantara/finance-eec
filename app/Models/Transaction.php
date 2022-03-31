<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\Project;
use App\Models\TransactionFiles;

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
        'project_id',
        'type',
        'status',
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
        return $this->hasMany(TransactionFiles::class, 'id');
    }
}
