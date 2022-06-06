<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binance;

class TestController extends Controller
{
    //

    //Above the construct
protected $api;
//These are the cryptos you want to trade with
protected $allowedCrypto = array('RDNBTC', 'SCBTC', 'LTCBTC', 'BNBBTC', 'NEOBTC', 'GASBTC', 'MCOBTC', 'WTCBTC', 'SALTBTC', 'EVXBTC', 'REQBTC', 'ICXBTC');


     public function __construct()
    {
     
     $this->api = new Binance\API("H2pcIHaE1DQ4yQQrnygjXzwcKzTdBrK1pYuffTnO4KfgE953ShVLR9UWitwX1w0K","eW1HnmgxmtNDzvL1UwA8GtcE1AnWWHc7eRFYf2MsBkMOkQSGyHx6AH30HfDPjloS");
    }

 

    public function index(){


    	 $ticker = $this->api->prices();
        $trades = array();



    	dd($ticker);
    }
}
