<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessImportedTrades;
use App\My\Models\Trade;
use App\My\Models\TradeLog;
use Illuminate\Http\Request;

use DB;
use Session;
use Carbon\Carbon;

use App\My\Classes\TradeImport;
use App\My\Classes\IBTradeLogFile;

class CsvController extends Controller
{

		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.import.csv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'trade_file' => 'required|file',
        ]);

        $file = $request->trade_file;
	
		$tradeImport=new TradeImport(new IBTradeLogFile(TradeImport::INTERACTIVE_BROKERS,IBTradeLogFile::MANUAL,$file));
		$tradeImport->importTradeLogs();

		ProcessImportedTrades::dispatch();

        if (!Session::has('error')){
            Session::flash('success', 'Csv ' . $file->getClientOriginalName() . ' imported and processed succesfully.');
        }

        return redirect()->back();
    }
	
	public function automatedImport(){
		$tradeImport=new TradeImport(new IBTradeLogFile(TradeImport::INTERACTIVE_BROKERS,IBTradeLogFile::AUTOMATED));
		$tradeImport->importTradeLogs();
		
		
		ProcessImportedTrades::dispatch()
			->delay(Carbon::now()->addMinutes(10));
	}
	
	public function processTradeLog(){
		$tradeImport=new TradeImport();
		$tradeImport->processTradeLog();
		
	}
	
}
