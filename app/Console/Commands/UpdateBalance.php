<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Balance;

class UpdateBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:update:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Balance update yearly with the last year balance';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $curBalanceCash = Balance::where([['category', 'cash'], ['year', ((Carbon::now()->year) - 1)]])->first();
        $curBalanceOp = Balance::where([['category', 'operational'], ['year', ((Carbon::now()->year) - 1)]])->first();
        $curBalanceEsc = Balance::where([['category', 'escrow'], ['year', ((Carbon::now()->year) - 1)]])->first();
        
        $newBalanceCash = Balance::create([
            'category' => 'cash',
            'balance' => $curBalanceCash->balance,
            'year' => Carbon::now()->year,
        ]);

        $newBalanceOp = Balance::create([
            'category' => 'operational',
            'balance' => $curBalanceOp->balance,
            'year' => Carbon::now()->year,
        ]);

        $newBalanceEsc = Balance::create([
            'category' => 'escrow',
            'balance' => $curBalanceEsc->balance,
            'year' => Carbon::now()->year,
        ]);
    }
}
