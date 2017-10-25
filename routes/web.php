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

Route::get('/import/csv/automated-import', 'CsvController@automatedImport')->name('csv.automated-import');

Route::get('/import/csv/process-trade-log', 'CsvController@processTradeLog')->name('csv.process-trade-log');
Route::get('/import/csv/reset-trade-log', 'CsvController@resetTradeLogProcessing')->name('csv.reset-trade-log');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
	
	Voyager::routes();
	
	Route::get('/import/csv/bulk-import/create', 'CsvController@create')->name('import.csv.bulk-import.create');
    Route::post('/import/csv/bulk-import/store', 'CsvController@store')->name('import.csv.bulk-import.store');
    
    Route::post('/trades', 'TradesController@index')->name('admin.trades.index');
});