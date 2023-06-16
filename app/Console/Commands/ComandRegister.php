<?php

namespace App\Console\Commands;

use App\Models\Payment;
use App\Models\Register;
use Illuminate\Console\Command;

class ComandRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $credit = Payment::query()->where('form_payment', 'credit')->count();
        $debit = Payment::query()->where('form_payment', 'debit')->count();

        Register::query()->create([
            'donor_count_credit' => $credit,
            'donor_count_debit' => $debit
        ]);

        return Command::SUCCESS;
    }
}
