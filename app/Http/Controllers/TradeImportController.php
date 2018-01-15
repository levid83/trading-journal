<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessImportedTrades;
use Illuminate\Http\Request;

use DB;
use Session;
use Carbon\Carbon;

use App\My\Classes\TradeImport;
use App\My\Classes\IBTradeLogFile;

class TradeImportController extends Controller
{

		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	return redirect()->action('CsvController@create');
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
		try {
			$tradeImport = new TradeImport(new IBTradeLogFile(TradeImport::INTERACTIVE_BROKERS, IBTradeLogFile::MANUAL, $file));
			$tradeImport->importTradeLogs();
		}catch(\Exception $e){
			Session::flash('error','Sorry the following error has been occurred: '.$e->getMessage());
			return redirect()->back();
		}

		ProcessImportedTrades::dispatch();

        if (!Session::has('error')){
            Session::flash('success', 'Csv ' . $file->getClientOriginalName() . ' imported succesfully.');
        }

        return redirect()->back();
    }
	
	public function automatedImport(){
		try {
			$tradeImport = new TradeImport(new IBTradeLogFile(TradeImport::INTERACTIVE_BROKERS, IBTradeLogFile::AUTOMATED));
			$tradeImport->importTradeLogs();
		}catch (\Exception $e){
			return false;
		}
		ProcessImportedTrades::dispatch();//->delay(Carbon::now()->addMinutes(10));
	}
	
	
}
