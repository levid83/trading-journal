<?php

namespace App\Http\Controllers;

use App\TradeLog;
use Illuminate\Http\Request;
use Excel;
use DB;
use Storage;
use Session;
use File;
use App\TradingAccount;
use App\TradeLogFile;

class CsvController extends Controller
{

    private function saveTradeLogList($account_id=0, $trade_log_file_id=0, $data=array()){

        if (!empty($data)) {
            foreach ($data as $key => $row) {
                $record=array();
                if (isset($row['comb.']) && $row['comb.']!=''){
                    //logic to pull out tactic info
                }else {

                    if (isset($row['clientaccountid'])) { //manual bulk upload

                        $row['id']=isset($row['ibexecid']) ? $row['ibexecid'] : ''; // needs at the duplication check an update

                        if ($row['clientaccountid']!='ClientAccountID') { //header could be repeated in the csv
                            $record = [
                                'trading_account_id' => $account_id,
                                'trade_log_file_id' => $trade_log_file_id,
                                'account' => isset($row['clientaccountid']) ? $row['clientaccountid'] : '',/* ClientAccountID */
                                'execution_id' => isset($row['ibexecid']) ? $row['ibexecid'] : '',/* IBExecID - IB unique execution id */
                                'asset_class' => isset($row['assetclass']) ? $row['assetclass'] : '', /* AssetClass */
                                'expiry' => isset($row['expiry']) ? $row['expiry'] : '', /* Expiry */
                                'strike' => isset($row['strike']) ? $row['strike'] : '',/* Strike */
                                'put_call' => isset($row['putcall']) ? $row['putcall'] : '',/* Put/Call */
                                'currency' => isset($row['currencyprimary']) ? $row['currencyprimary'] : '',/* CurrencyPrimary */
                                'action' => isset($row['buysell']) ? $row['buysell'] : '',/* Buy/sell */
                                'quantity' => isset($row['quantity']) ? $row['quantity'] : '',/* Quantity */
                                'description' => isset($row['description']) ? $row['description'] : '',/* Description */
                                'financial_instrument' => isset($row['description']) ? $row['description'] : '',/* Description */
                                'symbol' => isset($row['symbol']) ? $row['symbol'] : '',/* Symbol */
                                'exchange' => isset($row['exchange']) ? $row['exchange'] : '',/* Exchange */
                                'commission' => isset($row['ibcommission']) ? $row['ibcommission'] : '',/* IBCommission */
                                'order_id' => isset($row['iborderid']) ? $row['iborderid'] : '',/* IBOrderID */
                                'exch_exec_id' => isset($row['extexecid']) ? $row['extexecid'] : '',/* ExtExecID */
                                'exch_order_id' => isset($row['exchorderid']) ? $row['exchorderid'] : '',/* ExchOrderID */
                                'open_close' => isset($row['opencloseindicator']) ? $row['opencloseindicator'] : '',/* Open/Close  */
                                'costbasis' => isset($row['costbasis']) ? $row['costbasis'] : '',/* CostBasis */
                                'conid' => isset($row['conid']) ? $row['conid'] : '',/* Conid  */
                                'order_time' => isset($row['ordertime']) ? $row['ordertime'] : '',/* OrderTime  */
                                'order_type' => isset($row['ordertype']) ? $row['ordertype'] : '',/* OrderType  */

                            ];

                            $record['underlying'] = (isset($row['underlyingsymbol']) && $row['underlyingsymbol']!='')? $row['underlyingsymbol']
                                : (isset($row['symbol']) ? $row['symbol'] : ''); /* UnderlyingSymbol or Symbol */

                            $record['price'] = (isset($row['tradeprice']) && isset($row['multiplier']))? $row['tradeprice']*$row['multiplier'] : '';

                            $record['time'] = isset($row['tradedate']) && isset($row['tradetime']) ? $row['tradedate'].' '.$row['tradetime']:'';

                        }else{
                            continue; //skip the inner headers
                        }
                    }else{ //automated upload
                        $record = [
                            'trading_account_id' => $account_id,
                            'trade_log_file_id' => $trade_log_file_id,
                            'account' => isset($row['account']) ? $row['account'] : '',/* ClientAccountID */
                            'execution_id' => isset($row['id']) ? $row['id'] : '',/* IBExecID - IB unique execution id */
                            'underlying' => isset($row['underlying']) ? $row['underlying'] : '', /* UnderlyingSymbol or Symbol */
                            'asset_class' => isset($row['security_type']) ? $row['security_type'] : '', /* AssetClass */
                            'expiry' => isset($row['last_trading_day']) ? $row['last_trading_day'] : '', /* Expiry */
                            'strike' => isset($row['strike']) ? $row['strike'] : '',/* Strike */
                            'put_call' => isset($row['putcall']) ? $row['putcall'] : '',/* Put/Call */
                            'currency' => isset($row['currency']) ? $row['currency'] : '',/* CurrencyPrimary */
                            'action' => isset($row['action']) ? $row['action'] : '',/* Buy/sell */
                            'quantity' => isset($row['quantity']) ? $row['quantity'] : '',/* Quantity */
                            'description' => isset($row['description']) ? $row['description'] : '',/* Description */
                            'financial_instrument' => isset($row['fin_instrument']) ? $row['fin_instrument'] : '',/* Description */
                            'symbol' => isset($row['symbol']) ? $row['symbol'] : '',/* Symbol */
                            'exchange' => isset($row['exch.']) ? $row['exch.'] : '',/* Exchange */
                            'comment' => isset($row['comment']) ? $row['comment'] : '',/* Empty */
                            'submitter' => isset($row['submitter']) ? $row['submitter'] : '',/* Empty */
                            'commission' => isset($row['commission']) ? $row['commission'] : '',/* IBCommission */
                            'realized_pl' => isset($row['realized_pl']) ? $row['realized_pl'] : '',/* Empty */
                            'order_id' => isset($row['order_id']) ? $row['order_id'] : '',/* IBOrderID */
                            'exch_exec_id' => isset($row['exch._exec._id']) ? $row['exch._exec._id'] : '',/* ExtExecID */
                            'exch_order_id' => isset($row['exch._order_id']) ? $row['exch._order_id'] : '',/* ExchOrderID */
                            'trading_class' => isset($row['trading_class']) ? $row['trading_class'] : '',/* Empty */
                            'price_incl_fees' => isset($row['price_incl._fees']) ? $row['price_incl._fees'] : '',/* Empty */
                            'open_close' => isset($row['openclose']) ? $row['openclose'] : '',/* Open/Close  */

                            //new fields
                        ];

                        //@todo needs conversion  price * multiplier -> ask/bid/contract
                        $record['price'] = isset($row['price']) ? $row['price'] : '';

                        $record['time'] = isset($row['date']) ? substr($row['date'], 0, 4) . '-' . substr($row['date'], 4, 2) . '-'
                            . substr($row['date'], 6, 2) . ' ' . (isset($row['time']) ? $row['time'] : '00:00:00') : '0000-00-00 00:00:00';
                    }
                }
                if (!empty($record)) {
                    $duplication = TradeLog::where('execution_id', $row['id'])->get();
                    if ($duplication->count() > 0) {
                        if (!isset($row['clientaccountid'])) { //don't replace the automated import values with bulk values
                            DB::table('trade_logs')->where('execution_id', $row['id'])->update($record);
                        }
                    } else {
                        $new_values[] = $record;
                    }
                }
            }
            if (!empty($new_values)) {
                DB::table('trade_logs')->insert($new_values);
            }
        }
    }

    private function saveImportFileMeta($account_id=0,$file,$last_modified){

        $tradeLogFile=TradeLogFile::where('trading_account_id',$account_id)
            ->where('file_name',$file)->get();

        if ($tradeLogFile->count()>0){
            $file_id=$tradeLogFile->first()->id;
               TradeLogFile::where('trading_account_id',$account_id)
                ->where('file_name',$file)->update(['last_modification'=>$last_modified]);
         }else {
            $tradeLogFile = TradeLogFile::create([
                'trading_account_id' => $account_id,
                'file_name' => $file,
                'last_modification' => $last_modified
            ]);

            $file_id=$tradeLogFile->id;
        }
        return $file_id;
    }

    private function handleAutomatedImport(){

        $directories = Storage::directories('/csv/automated/');
        if (!empty($directories)){
            foreach($directories as $directory) {
                $files = Storage::disk('local')->files($directory);
                $account = TradingAccount::where('account_id', str_replace_first('csv/automated/', '', $directory))->first();
                if ($account->id > 0) { //if trading account exists
                    if (!empty($files)) {
                        foreach ($files as $file) {
                            $last_modified = date("Y-m-d H:i:s", Storage::disk('local')->lastModified($file));
                            //check the uploaded file if already exists in the db and it's date
                            $db_file = TradeLogFile::where('file_name', $file)->where('last_modification', '>=', $last_modified)->get();
                            if ($db_file->count() == 0) {
                                $data = Excel::load(storage_path('app/' . $file), function ($reader) {
                                })->get();
                                $trade_log_file_id=$this->saveImportFileMeta($account->id, $file,$last_modified);
                                $this->saveTradeLogList($account->id, $trade_log_file_id, $data);

                            }
                        }
                    }
                }
            }
        }
    }

    private function handleBulkImport($filename,$account_name)
    {


        if (Storage::disk('local')->exists($filename)){
            $account = TradingAccount::where('account_id', $account_name)->first();
            if ($account->id > 0) { //if trading account exists
                    $last_modified = date("Y-m-d H:i:s", Storage::disk('local')->lastModified($filename));
                    //check the uploaded file if already exists in the db and it's date
                    $db_file = TradeLogFile::where('file_name', $filename)->where('last_modification', '>=', $last_modified)->get();
                    if ($db_file->count() == 0) {
                        $data = Excel::load(storage_path('app/' . $filename), function ($reader) {
                        })->get();
                        $trade_log_file_id = $this->saveImportFileMeta($account->id, $filename, $last_modified);
                        $this->saveTradeLogList($account->id, $trade_log_file_id, $data);
                    }else {
                        $this->saveImportFileMeta($account->id, $filename, $last_modified);
                    }
            } else {
                Session::flash('error', "Trading account doesn't exist or the file name isn't correct!");
            }
        }else{
            Session::flash('error', "File '. $filename . ' account doesn't exist!");
        }

    }

    public function automatedImport(){
        $this->handleAutomatedImport();
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

        $account_name=substr($file->getClientOriginalName(), 0, strpos($file->getClientOriginalName(),'_'));

       /*
        $extension = $file->getClientOriginalExtension();
        $file_base_name=substr($file->getClientOriginalName(), 0, strpos($file->getClientOriginalName(),'.'.$extension));
        $file_path='csv/manual/'.$file_base_name.time().'.'.$extension;
        */
        $file_path='csv/manual/'.$file->getClientOriginalName();

        Storage::disk('local')->put($file_path,  File::get($file));

        $this->handleBulkImport($file_path,$account_name);

        if (!Session::has('error')){
            Session::flash('success', 'Csv ' . $file->getClientOriginalName() . ' imported and processed succesfully.');
        }

        return redirect()->back();
    }

}
