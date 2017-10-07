<?php
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 1:58 PM
 */

namespace App\My\Classes;

use Excel;
use DB;
use GuzzleHttp\Psr7\UploadedFile;
use Mockery\Exception;
use Storage;
use File;

use App\My\Models\TradingAccount;
use App\My\Models\TradeLogFile;

use App\My\Contracts\TradeLogProvider;
use App\My\Exceptions\TradeImportException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class IBTradeLogFile implements TradeLogProvider
{
    const MANUAL=1;
    const AUTOMATED=2;

    const DIRECTORIES=[1=>'csv/manual/',2=>'csv/automated/'];

    private $broker;
    private $method;

    private $directory=null;
    private $file=null;

    private $tradeLogs=[];

    public function __construct($broker,$method,$file=null){
        $this->broker=$broker;
        $this->method=$method;
        $this->file=$file;
    }

    private function uploadFile(){
        Storage::disk('local')->put($this->getFilePath(),  File::get($this->file));
    }

    private function saveImportFileMeta($account_id=0,$file,$last_modified){

        $tradeLogFile=TradeLogFile::where('trading_account_id',$account_id)->where('file_name',$file)->get();

        if ($tradeLogFile->count()>0){
            $file_id=$tradeLogFile->first()->id;
            TradeLogFile::where('trading_account_id',$account_id)->where('file_name',$file)
                ->update(['last_modification'=>$last_modified]);
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

    private function mapTradeLog($params=[]){
        if (isset($params['data']) && !empty($params['data'])){
            $this->mapper->setData($params['data'])
                ->setAccountId($params['account_id'])
                ->setTradeLogEntityId($params['trade_log_file_id']);

            $this->mapper->map();

            return $this->mapper->getMap();
        }else{
            return false;
        }
    }

    public function getBroker(){
        return $this->broker;
    }

    public function getMethod(){
        return $this->method;
    }

    public function getFile(){
        return $this->file;
    }

    public function getTradeLogs(){
        return $this->tradeLogs;
    }

    public function getAccountId($directory=''){
        if($this->getMethod()==self::MANUAL) {
            return substr($this->file->getClientOriginalName(), 0, strpos($this->file->getClientOriginalName(), '_'));
        }else{
            return str_replace_first('csv/automated/', '', $directory);
        }
    }
    public function getDirectory(){
       return self::DIRECTORIES[$this->method].TradeImport::BROKER_DIRECTORIES[$this->broker];
    }

    public function getFilePath(){
        return $this->getDirectory().$this->file->getClientOriginalName();
    }

    static public function getFileLastModificationDate($filename){
        return date("Y-m-d H:i:s", Storage::disk('local')->lastModified($filename));
    }

    static public function fileExists($filename){
        return Storage::disk('local')->exists($filename);
    }

    public function parseFile($filename,$accountId){
        $last_modified=self::getFileLastModificationDate($filename);
        //check if file already exists in the db and it's date
        $db_file = TradeLogFile::where('file_name', $filename)->where('last_modification', '>=', $last_modified)->get();
        if ($db_file->count() == 0) {
            $trade_log_file_id = $this->saveImportFileMeta($accountId, $filename, $last_modified);
            $data = Excel::load(storage_path('app/' . $filename), function ($reader) {})->get();
            return $this->mapTradeLog(['data'=>$data,'account_id'=>$accountId,'trade_log_file_id'=>$trade_log_file_id]);
        }else {
            $this->saveImportFileMeta($accountId, $filename, $last_modified);
            return [];
        }

    }

    public function parseFiles(){
        if($this->getMethod()==self::MANUAL){
            $this->uploadFile();
            if (self::fileExists($this->getFilePath())){
                $account = TradingAccount::where('account_id', $this->getAccountId())->first();
                if ($account->id > 0) { //if trading account exists
                   $this->tradeLogs=$this->parseFile($this->getFilePath(), $account->id);
                }else{ //create it
                    TradingAccount::create(['account_id'=>$this->getAccountId(),
                                            'account_name'=> $this->getAccountId(),
                                            'account_type'=> '',
                        ]);
                }

            }else{
                throw new FileException("File '.$this->getFilePath().' account doesn't exist!");
            }
        }
        if($this->getMethod()==self::AUTOMATED){
            $directories = Storage::directories($this->getDirectory());
            if (!empty($directories)) {
                foreach ($directories as $directory) {
                    $files = Storage::disk('local')->files($directory);
                    $account = TradingAccount::where('account_id', $this->getAccountId())->first();
                    if ($account && $account->id > 0) { //if trading account exists
                        if (!empty($files)) {
                            foreach ($files as $file) {
                                $result=$this->parseFile($file,$account->id);
                                $this->tradeLogs=array_merge($this->tradeLogs,$result);
                            }
                        }
                    }else {//create it
                        TradingAccount::create(['account_id'=>$this->getAccountId(),
                            'account_name'=> $this->getAccountId(),
                            'account_type'=> '',
                        ]);
                    }
                }
            }
        }
    }

    public function createFileMapper(){

        if ($this->getBroker()==TradeImport::INTERACTIVE_BROKERS) {
            if ($this->getMethod() == self::MANUAL) {
                return new IBFlexQueryResultMap();
            } elseif ($this->getMethod() == self::AUTOMATED) {
                return new IBTWSTradeExportMap();
            } else {
                throw new TradeImportException("Import format " . $format . " doesn't exist! ");
            }
        }
        return false;
    }

    public function buildTradeLogs(Array $params=[]){
        $this->mapper=$this->createFileMapper();
        $this->parseFiles();
    }

}