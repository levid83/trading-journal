<?php

namespace App\Jobs;

use App\My\Exceptions\TradeImportException;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use DB;
use App\User;
use App\Mail\TradeImportDone;
use App\My\Classes\TradeImport;

class ProcessImportedTrades implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	

    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }
	
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	try {
			$result = (new TradeImport())->processTradeLog();
		}catch(TradeImportException $e){
			return false;
		}
		if (Auth::user()) {
			Mail::to(Auth::user()->email)->send(new TradeImportDone());
		}
		return $result;
    }
}
