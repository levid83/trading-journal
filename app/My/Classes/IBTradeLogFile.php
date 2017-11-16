<?php
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 1:58 PM
 */

namespace App\My\Classes;

use App\My\Models\Trade;
use Carbon\Carbon;
use Excel;
use DB;
use Mockery\Exception;
use PhpParser\Node\Expr\Array_;
use Storage;
use File;

use App\My\Models\TradingAccount;
use App\My\Models\TradeLogFile;

use App\My\Contracts\TradeLogProvider;
use App\My\Exceptions\TradeImportException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * Class IBTradeLogFile
 * @package App\My\Classes
 */
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
	
	/**
	 * IBTradeLogFile constructor.
	 *
	 * @param      $broker
	 * @param      $method
	 * @param null $file
	 */
    public function __construct($broker,$method,$file=null){
        $this->broker=$broker;
        $this->method=$method;
        $this->file=$file;
    }
	
	/**
	 *
	 */
    private function uploadFile(){
        Storage::disk('local')->put($this->getFilePath(),  File::get($this->file));
    }

	/**
	 * @param array $params
	 *
	 * @return bool
	 */
    private function mapTradeLog($params=[]){
        if (isset($params['data']) && !empty($params['data'])){
            $this->mapper->setData($params['data']);
			return $this->mapper->map();

        }else{
            return false;
        }
    }
	
	/**
	 * @param string $directory
	 *
	 * @return bool|string
	 */
    private function getAccountIdFromDirectoryName($directory=''){
		return str_replace_first('csv/automated/'.TradeImport::BROKER_DIRECTORIES[$this->broker], '', $directory);
    }
    
    private function addTraderIfNotExists($trader_id=null){
		$account = TradingAccount::where('account_id',$trader_id)->first();
		if (!$account) 	$account=TradingAccount::create(['account_id'=>$trader_id,
											 'account_name'=> $trader_id,
											 'account_type'=> 'trader',
											]);
		return $account;
	}
	
	/**
	 * get the client id based on trade log "account" column
	 *
	 * @param $client_account
	 *
	 * @return int|mixed
	 */
	private function getClientIdByAccount($client_account){
		
		return TradingAccount::where('account_id', $client_account)
			->orWhere('account_name',$client_account)->first()->id;
	}
	
    private function getTradeLogMetaInfoFromCsv($filename, $delimiter=",", $enclosure='"', $escape="\\"){
    	$metainfo=[];
		if (($handle = fopen(storage_path('app/' . $filename), "r"))!==false){
			//get only the first row with meta info
			$data = fgetcsv($handle, 1000, $delimiter, $enclosure, $escape);
			fclose($handle);
			
			if ($data[0]!='BOF'){
				throw new TradeImportException('Missing BOF from the beginning of the file');
			}
			if (!empty($data[1])){
				$metainfo['trader_id']=$data[1];
			}else{
				throw  new TradeImportException('Trader Account Id is missing! ');
			}
			try{
				Carbon::createFromFormat('Y-m-d', $data[4]);
				$metainfo['start_date']=$data[4];
			}catch(\Exception $e){
				throw  new TradeImportException('Start date is missing or invalid!');
			}
			try{
				Carbon::createFromFormat('Y-m-d', $data[5]);
				$metainfo['end_date']=$data[5];
			}catch(\Exception $e){
				throw  new TradeImportException('End date is missing or invalid!');
			}
			
		}else{
			throw  new TradeImportException('File is empty! ');
		}
			
		return $metainfo;
		
	}
	
	/**
	 * saves the trade log file meta info into database
	 *
	 * @param $file
	 * @param $client_id
	 * @param $meta
	 *
	 * @return int|mixed
	 */
	private function saveTradeLogFileMeta($file ,$client_id, $meta){
		$last_modified=self::getFileLastModificationDate($this->getFilePath());
		$objTradeLogFile = TradeLogFile::where('file_name', $file)
			->where('client_id',$client_id)
			->where('last_modification', '>=', $last_modified)->first();
		
		if ($objTradeLogFile){
			$objTradeLogFile->start_date=isset($meta['start_date'])?$meta['start_date']:null;
			$objTradeLogFile->start_date=isset($meta['end_date'])?$meta['end_date']:null;
			$objTradeLogFile->last_modification=$last_modified;
			$objTradeLogFile->save();
		}else {
			$objTradeLogFile = TradeLogFile::create([
				'client_id' => 	$client_id,
				'file_name' => 	$file,
				'start_date' => isset($meta['start_date'])?$meta['start_date']:null,
				'end_date' => 	isset($meta['end_date'])?$meta['end_date']:null,
				'last_modification' => $last_modified
			]);
		}
		
		return $objTradeLogFile->id;
	}
	
	/**
	 * checks the last update against the start date to avoid gaps in the logs
	 * @return bool
	 */
	private function hasDisruptionInTradeLog($client_id,$start_date){
		
		$previous_trade_log_exists=TradeLogFile::where('client_id',$client_id)->exists();
		if ($previous_trade_log_exists)
			return !TradeLogFile::where('client_id',$client_id)->where('end_date','>=',$start_date)->exists();
		else {
			return false;
		}
	}
	
	/**
	 * @return mixed
	 */
	public function getBroker(){
		return $this->broker;
	}
	
	/**
	 * @return mixed
	 */
	public function getMethod(){
		return $this->method;
	}
	
	/**
	 * @return null
	 */
	public function getFile(){
		return $this->file;
	}
	
	/**
	 * @return array
	 */
	public function getTradeLogs(){
		return $this->tradeLogs;
	}
	
	/**
	 * @return string
	 */
    public function getDirectory(){
       return self::DIRECTORIES[$this->method].TradeImport::BROKER_DIRECTORIES[$this->broker];
    }
	
	/**
	 * @return string
	 */
    public function getFilePath(){
        return $this->getDirectory().$this->file->getClientOriginalName();
    }
	
	/**
	 * @param $filename
	 *
	 * @return false|string
	 */
    static public function getFileLastModificationDate($filename){
        return date("Y-m-d H:i:s", Storage::disk('local')->lastModified($filename));
    }
	
	/**
	 * @param $filename
	 *
	 * @return mixed
	 */
    static public function fileExists($filename){
        return Storage::disk('local')->exists($filename);
    }
    
	
	/**
	 * @param $filename
	 * @param $accountId
	 *
	 * @return array|bool
	 */
    public function parseCsvFile($filename){
		return $this->mapTradeLog(['data'=>Excel::load(storage_path('app/' . $filename))->get()]);
    }
	
	public function postProcessingTradeLog($logs,$meta){
  		//creates and/or get the trader id
		$trader_id=$this->addTraderIfNotExists($meta['trader_id'])->id;
		
		//creates a collection from array and group them by client account
		$logs=collect($logs);
		$groups=$logs->groupBy('account');
		
		$groups->transform(
			//set the client id, trader id for each group
			function($logs, $client_account) use ($trader_id,$meta){
				
				$client_id=$this->getClientIdByAccount($client_account);
				if (!$this->hasDisruptionInTradeLog($client_id,$meta['start_date'])) {
					$trade_log_file_id = $this->saveTradeLogFileMeta($this->getFilePath(), $client_id,$meta);
					
					$logs->transform(
						//set the client id, trader id, log file id for each trade log item
						function($log,$idx) use ($trader_id,$client_id,$trade_log_file_id){
							$log['client_id']=$client_id;
							$log['trader_id']=$trader_id;
							$log['trade_log_file_id']=$trade_log_file_id;
							return $log;
						}
					);
					return $logs;
				}else{
					throw new TradeImportException(' Disruption in trade log.');
				}
			}
		);
		return $groups->flatten(1);
	}
    
	/**
	 *
	 */
    public function parseFiles(){
        if($this->getMethod()==self::MANUAL){
            $this->uploadFile();
            if (self::fileExists($this->getFilePath())){
          		$meta_info = $this->getTradeLogMetaInfoFromCsv($this->getFilePath());
								
				config(['excel.import.startRow'=>'4']);
				$result=$this->parseCsvFile($this->getFilePath());
				$this->tradeLogs=$this->postProcessingTradeLog($result,$meta_info);
				
            }else{
                throw new FileException("File '.$this->getFilePath().' doesn't exist!");
            }
        }
        if($this->getMethod()==self::AUTOMATED){
            $directories = Storage::directories($this->getDirectory());
            if (!empty($directories)) {
                foreach ($directories as $directory) {
                    $files = Storage::disk('local')->files($directory);
					$account=$this->getAccountIdFromDirectoryName($directory);
					if (!empty($files)) {
						foreach ($files as $file) {
							
							$result=$this->parseCsvFile($this->getFilePath());
							$result=$this->postProcessingTradeLog($result,['trader_id'=>$account]);
							$this->tradeLogs=array_merge($this->tradeLogs,$result);
						}
					}
                }
            }
        }
    }
	
	/**
	 * @return IBFlexQueryResultMap|IBTWSTradeExportMap|bool
	 * @throws TradeImportException
	 */
    public function createFileMapper(){

        if ($this->getBroker()==TradeImport::INTERACTIVE_BROKERS) {
            if ($this->getMethod() == self::MANUAL) {
                return new IBFlexQueryResultMap();
            } elseif ($this->getMethod() == self::AUTOMATED) {
                return new IBTWSTradeExportMap();
            } else {
                throw new TradeImportException("Import method ".$this->getMethod()." doesn't exist! ");
            }
        }
        return false;
    }
	
	/**
	 * @param array $params
	 */
    public function buildTradeLogs(Array $params=[]){
        $this->mapper=$this->createFileMapper();
        $this->parseFiles();
    }

}