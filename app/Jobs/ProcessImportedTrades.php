<?php

namespace App\Jobs;

use App\Mail\TradeImportDone;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

use DB;

use App\My\Classes\TradeImport;
use App\My\Models\TradeLog;

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
	
	private function getUnprocessedTradeLogs(){
		return TradeLog::where('processed',0)->orderBy('time','asc')->offset(0)->limit(10)->get();
	}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		DB::beginTransaction();
    	$tradeLogs=$this->getUnprocessedTradeLogs();
       	dd($tradeLogs);
       	
       	
		DB::commit();
    	
    	Mail::to('danellevente@yahoo.com')->send(new TradeImportDone());
    }
}
