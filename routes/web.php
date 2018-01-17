<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/import/csv/automated-import', 'CsvController@automatedImport')->name('csv.automated-import');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
	
	Route::get('/trade-import/create', 'TradeImportController@create')->name('trade-import.create');
    Route::post('/trade-import/store', 'TradeImportController@store')->name('trade-import.store');
	
    Route::resource('trades','TradesController');
			
	//Route::get('/assets', 'AssetsController@index')->name('admin.assets.index');
	Route::get('/tactics', 'TacticsController@index')->name('admin.tactics.index');
	Route::get('/positions', 'PositionsController@index')->name('admin.positions.index');
	
	
	
	Route::resource('comments','CommentsController');
	Route::get('/comments/position/{position_id}','CommentsController@position');
});
