<?php

namespace App\Console\Commands;

use App\Events\CallbackNotification;
use App\Models\LauronAccount;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CallBackNotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:callbacknotif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // Step 1 : Get list of accounts for callback
        $callBackAccounts = LauronAccount::where('deleted', '0')->where(function ($query) {
            $query->where('leadStatus', 'like', '%CB -%');
            //   ->orWhere('leadStatus', 'like', '%CAL%')
        })->get();
        // Step 2 : Create Iteration and run broadcast for each iteration that passes
        foreach ($callBackAccounts as $acct) {
        if (Carbon::now()->gte(Carbon::parse($acct->callbackDate))){
          event(new CallbackNotification([
            'message' => 'Accounts in callback list due for call',
            'user_id' => $acct->agentNumber,
          ]));
          }elseif(Carbon::now()->gte(Carbon::parse($acct->callbackDate)->subMinutes(5))){
            event(new CallbackNotification([
              'message' => 'Accounts in callback list to be called in 5 minutes',
              'user_id' => $acct->agentNumber,
            ]));

          }elseif(Carbon::now()->gte(Carbon::parse($acct->callbackDate)->subMinutes(10))) {
              //change user_id and message
              event(new CallbackNotification([
                'message' => 'Accounts to be called in 10 minutes',
                'user_id' => $acct->agentNumber,
              ]));

          }
        }
        $this->info('DONE');
    }
}
