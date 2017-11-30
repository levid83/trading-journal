<?php
	
	namespace Tests\Unit;
	
	use Mockery;
	
	use App\My\Classes\IBFlexQueryResultMap;
	use App\My\Exceptions\TradeImportException;
	use App\My\Repositories\Eloquent\TradeRepository;
	use Maatwebsite\Excel\Facades\Excel;
	use Tests\TestCase;
	use Illuminate\Foundation\Testing\DatabaseMigrations;
	use Illuminate\Foundation\Testing\DatabaseTransactions;
	
	/**
	 * Class IBFlexQueryResultMapTest
	 * @package Tests\Unit
	 */
	class IBFlexQueryResultMapTest extends TestCase
	{
		/**
		 * @var IBFlexQueryResultMap
		 */
		private $objFlexQueryResultMap;
		private $csvData;
		
		private static $instance;
		
		public static function setUpBeforeClass(){
			self::$instance =(new static);
			self::$instance->createApplication();
			self::$instance->csvData=Excel::load(__DIR__ . '/../Csv/ib_flex_query_trade_logs.csv')->get()->toArray();
			
		}
		
		protected function setUp(){
			parent::setUp();
			
			$tradeRepoMock=Mockery::mock(TradeRepository::class);
			$tradeRepoMock->shouldReceive('assets')->once()->andReturn(
				collect([
				   ['aliases'=>'CL','price_correction'=>1, 'multiplier'=>1000],
				   ['aliases'=>'ZS','price_correction'=>100, 'multiplier'=>50]
			   ]));
						
			$this->objFlexQueryResultMap = new IBFlexQueryResultMap($tradeRepoMock);
			
		}
		
		protected function tearDown()
		{
			parent::tearDown();
			
			unset($this->objFlexQueryResultMap);
			
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
			$this->assertSame('', $data);
			
			$data=$this->objFlexQueryResultMap->fixOpenClose([]);
			$this->assertSame('', $data);
			
		}
		
		function test_it_fixes_the_action(){
			
			$data=$this->objFlexQueryResultMap->fixAction(['buysell'=>'buy']);
			$this->assertSame('BUY', $data);
			
			$data=$this->objFlexQueryResultMap->fixAction(['buysell'=>'sell']);
			$this->assertSame('SELL', $data);
			
			$data=$this->objFlexQueryResultMap->fixAction(['buysell'=>'asdasd']);
			$this->assertSame('', $data);
			
			$data=$this->objFlexQueryResultMap->fixAction([]);
			$this->assertSame('', $data);
			
		}
		
		function test_it_fixes_the_put_call(){
			
			$data=$this->objFlexQueryResultMap->fixPutCall(['putcall'=>'put']);
			$this->assertSame('PUT', $data);
			
			$data=$this->objFlexQueryResultMap->fixPutCall(['putcall'=>'call']);
			$this->assertSame('CALL', $data);
			
			$data=$this->objFlexQueryResultMap->fixPutCall(['putcall'=>'asdasd']);
			$this->assertSame('', $data);
			
			$data=$this->objFlexQueryResultMap->fixPutCall([]);
			$this->assertSame('', $data);
			
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
		
		function test_it_fixes_the_price(){
			$data=$this->objFlexQueryResultMap->fixPrice(['multiplier'=>'']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixPrice(['multiplier'=>'', 'tradeprice' =>'']);
			$this->assertSame(null, $data);
			
			$data=$this->objFlexQueryResultMap->fixPrice(['multiplier'=>'1000', 'tradeprice' =>'']);
			$this->assertEquals(0, $data);
			
			$data=$this->objFlexQueryResultMap->fixPrice(['multiplier'=>'5000', 'tradeprice' =>'0']);
			$this->assertEquals(0, $data);
			
			$data=$this->objFlexQueryResultMap->fixPrice(['multiplier'=>'', 'tradeprice' =>'10']);
			$this->assertEquals(10, $data);
			
			$data=$this->objFlexQueryResultMap->fixPrice(['multiplier'=>'1000', 'tradeprice' =>'0.12']);
			$this->assertEquals(120, $data);
			
		}
		
		function test_it_fixes_the_datetime(){
			
			$data=$this->objFlexQueryResultMap->fixDatetime([]);
			$this->assertSame('', $data);
			
			$data=$this->objFlexQueryResultMap->fixDatetime(['tradedate'=>'', 'tradetime' =>'']);
			$this->assertSame('', $data);
			
			$data=$this->objFlexQueryResultMap->fixDatetime(['tradedate'=>'2017-10-11', 'tradetime' =>'10:11:12']);
			$this->assertEquals('2017-10-11 10:11:12', $data);
			
		}
		
		
		
		function test_it_transforms_the_data(){
			
			$dataCollection=$this->objFlexQueryResultMap->removeHeaders(collect(self::$instance->csvData));
			$dataCollection=$this->objFlexQueryResultMap->transformData($dataCollection);
			$dataCollection->each(function ($item) {
				$res=array_intersect_key($this->objFlexQueryResultMap::MAP, $item->toArray());
				$this->assertNotEmpty($res);
			});
			
		}
	
		function test_the_mapper(){
			
			$this->expectException(TradeImportException::class);
			
			$this->objFlexQueryResultMap->map(self::$instance->csvData);
			
		}
		
	}
