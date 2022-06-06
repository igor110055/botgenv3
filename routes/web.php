<?php


//use Binance;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkprices', 'BackTestController@checkPrices')->name('checkPrices');

Route::get('/getPrices', 'BackTestController@getPrices');

Route::get('/getPricesbysymbol/{name}', 'BackTestController@getPricesbysymbol');

Route::get('/candlesticks/{ticker}/{time}', 'BackTestController@candlesticks');

Route::get('/checkBots', 'BackTestController@checkBots');

Route::get('/getpairs', 'BackTestController@getpairs');





Route::get('/checkTradingBot', [

    'uses' => 'ToolsController@checkTradingBids'

  ]);



   Route::get('/test2', 'TestController@index')->name('test2');

  Route::get('/test', function () {

         $ticker = $api->prices();

        return  print_r($ticker);
        
    })->name('test');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
