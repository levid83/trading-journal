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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
	
	Route::get('/csv/bulk-import/create', 'CsvController@create')->name('csv.bulk-import.create');
    Route::post('/csv/bulk-import/store', 'CsvController@store')->name('csv.bulk-import.store');
	
	Route::get('/trades', 'TradesController@index')->name('admin.trades');
    Route::post('/trades', 'TradesController@index')->name('admin.trades.index');
	
	
	Route::get('/tactics', 'TacticsController@index')->name('admin.tactics.index');
	
	Route::get('/positions', 'PositionsController@index')->name('admin.positions.index');
});