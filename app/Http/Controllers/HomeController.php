<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Above the construct
  protected $api;    
    
  //Above the construct
  //protected $api;
  //These are the cryptos you want to trade with
  protected $allowedCrypto = array('RDNBTC', 'SCBTC', 'LTCBTC', 'BNBBTC', 'NEOBTC', 'GASBTC', 'MCOBTC', 'WTCBTC', 'SALTBTC', 'EVXBTC', 'REQBTC', 'ICXBTC');

 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    $api = new \Binance\API("H2pcIHaE1DQ4yQQrnygjXzwcKzTdBrK1pYuffTnO4KfgE953ShVLR9UWitwX1w0K","eW1HnmgxmtNDzvL1UwA8GtcE1AnWWHc7eRFYf2MsBkMOkQSGyHx6AH30HfDPjloS");

    // Make sure you have an updated ticker object for this to work      
    $ticker = $api->prices(); 
    $balances = $api->balances($ticker);
    //print_r($balances);
    echo "BTC owned: ".$balances['BTC']['available'].PHP_EOL;
    echo "ETH owned: ".$balances['ETH']['available'].PHP_EOL;
    echo "USDT owned: ".$balances['USDT']['available'].PHP_EOL;

    echo "Estimated Value: ".$api->btc_value." BTC".PHP_EOL;




        return view('home');
    }
}
