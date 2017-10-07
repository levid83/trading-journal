<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use App\Events\TradesImported;

use App\My\Classes\TradeImport;
use App\My\Classes\IBTradeLogFile;

class CsvController extends Controller
{


    public function automatedImport(){
         (new TradeImport(
            new IBTradeLogFile(TradeImport::INTERACTIVE_BROKERS,IBTradeLogFile::AUTOMATED))
        )->importTradeLogs();

        event(new TradesImported());
    }

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

        (new TradeImport(
            new IBTradeLogFile(TradeImport::INTERACTIVE_BROKERS,IBTradeLogFile::MANUAL,$file))
        )->importTradeLogs();

        event(new TradesImported());

        if (!Session::has('error')){
            Session::flash('success', 'Csv ' . $file->getClientOriginalName() . ' imported and processed succesfully.');
        }

        return redirect()->back();
    }

}
