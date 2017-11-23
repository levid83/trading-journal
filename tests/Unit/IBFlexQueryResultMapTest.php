<?php
	
	namespace Tests\Unit;
	
	use App\My\Classes\IBFlexQueryResultMap;
	use App\My\Exceptions\TradeImportException;
	use App\My\Models\Asset;
	use App\My\Models\Trade;
	use App\My\Repositories\Eloquent\TradeRepository;
	use Maatwebsite\Excel\Facades\Excel;
	use Tests\CreatesApplication;
	use Tests\TestCase;
	use Illuminate\Foundation\Testing\DatabaseMigrations;
	use Illuminate\Foundation\Testing\DatabaseTransactions;
	
	class IBFlexQueryResultMapTest extends TestCase
	{
		use CreatesApplication, DatabaseTransactions;
		
		private $objFlexQueryResultMap;
		
		function setUp(){
			$this->createApplication();
			$this->objFlexQueryResultMap = new IBFlexQueryResultMap(new TradeRepository(new Trade()));
		}
		
		
		function underlyingProvider(){
			return [
				[
					[
					'underlying'=>'',
					'underlyingsymbol'=>'',
					'assetclass'=>'FOP',
					'description'=>'CL JAN18'
					],
					'CL'
				],
				[
					[
						'underlying'=>'',
						'underlyingsymbol'=>'AAPL',
						'assetclass'=>'STK',
						'description'=>'ANYTHING'
					],
					'AAPL'
				]
			];
		}
		/**
		 * @dataProvider underlyingProvider
		 */
		function test_it_fixes_the_underlying_symbol($row,$expected){
			
			$data=$this->objFlexQueryResultMap->fixUnderlyingSymbol($row);
			$this->assertSame($expected, $data);
			
		}

		
		/**
		 * @dataProvider underlyingProvider
		 */
		function test_it_fixes_the_underlying($row, $expected){
			
			$data=$this->objFlexQueryResultMap->fixUnderlyingSymbol($row);
			$this->assertSame($expected, $data);
			
		}
		
		function test_it_fixes_the_open_close(){
			
			$data=$this->objFlexQueryResultMap->fixOpenClose(['opencloseindicator'=>'open']);
			$this->assertSame('OPEN', $data);
			
			$data=$this->objFlexQueryResultMap->fixOpenClose(['opencloseindicator'=>'close']);
			$this->assertSame('CLOSE', $data);
			
			$data=$this->objFlexQueryResultMap->fixOpenClose(['opencloseindicator'=>'asdasd']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixOpenClose([]);
			$this->assertSame(null, $data);
			
		}
		
		function test_it_fixes_the_action(){
			
			$data=$this->objFlexQueryResultMap->fixAction(['buysell'=>'buy']);
			$this->assertSame('BUY', $data);
			
			$data=$this->objFlexQueryResultMap->fixAction(['buysell'=>'sell']);
			$this->assertSame('SELL', $data);
			
			$data=$this->objFlexQueryResultMap->fixAction(['buysell'=>'asdasd']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixAction([]);
			$this->assertSame(null, $data);
			
		}
		
		function test_it_fixes_the_put_call(){
			
			$data=$this->objFlexQueryResultMap->fixPutCall(['putcall'=>'put']);
			$this->assertSame('PUT', $data);
			
			$data=$this->objFlexQueryResultMap->fixPutCall(['putcall'=>'call']);
			$this->assertSame('CALL', $data);
			
			$data=$this->objFlexQueryResultMap->fixPutCall(['putcall'=>'asdasd']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixPutCall([]);
			$this->assertSame(null, $data);
			
		}
		
		function test_it_fixes_the_strike_price(){
			
			$data=$this->objFlexQueryResultMap->fixStrikePrice(['assetclass'=>'FOP', 'underlying' =>'CL']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixStrikePrice(['assetclass'=>'FOP', 'underlying' =>'CL','strike'=>'']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixStrikePrice(['assetclass'=>'FOP', 'underlying' =>'ZS','strike'=>'1.99']);
			$this->assertEquals(199.00, $data);
			
			$data=$this->objFlexQueryResultMap->fixStrikePrice(['assetclass'=>'OPT', 'underlying' =>'AAPL','strike'=>'1.99']);
			$this->assertEquals(1.99, $data);
			
			$data=$this->objFlexQueryResultMap->fixStrikePrice(['assetclass'=>'FOP', 'underlying' =>'CL','strike'=>'1.99']);
			$this->assertEquals(1.99, $data);
			
		}
		
		function test_it_fixes_the_datetime(){
			
			$data=$this->objFlexQueryResultMap->fixDatetime([]);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixDatetime(['tradedate'=>'', 'tradetime' =>'']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixDatetime(['tradedate'=>'2017-10-11', 'tradetime' =>'10:11:12']);
			$this->assertEquals('2017-10-11 10:11:12', $data);
			
		}
		
		
		function test_the_mapper(){
			
			$csv_data=Excel::load(__DIR__ . '/../Csv/ib_flex_query_trade_logs.csv')->get()->toArray();
			
			$this->expectException(TradeImportException::class);
			
			$this->objFlexQueryResultMap->map($csv_data);
			
		}
		
	}
