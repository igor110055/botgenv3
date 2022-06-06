<?php

namespace App\Http\Controllers;

//Top of the page
use App\{CoinPrices,TradingBots,CoinPairs};
use Carbon\Carbon;

class BackTestController extends Controller
{

 //Above the construct
protected $api;    
  protected $api_key;
  protected $secret;
//Above the construct
//protected $api;
//These are the cryptos you want to trade with
protected $allowedCrypto = array('RDNBTC', 'SCBTC', 'LTCBTC', 'BNBBTC', 'NEOBTC', 'GASBTC', 'MCOBTC', 'WTCBTC', 'SALTBTC', 'EVXBTC', 'REQBTC', 'ICXBTC','BTCUSDT');

public function __construct()
{
$this->api_key =env('BINANCE_API_KEY','');
$this->secret = env('BINANCE_SECRET','');
$this->api = new \Binance\API($this->api_key,$this->secret);
}




 public function getPricesc()
    {
      
         //Save the latest Trade 
       //  return now();   
    return CoinPrices::all();

       // return $CoinPrices;
    }

public function getPrices()
    {
      
         //Save the latest Trade 
       //  return now();   
    return CoinPrices::all();

    // $myarray =   CoinPrices::where('name', $name)->get();;
    foreach ($myarray as $key) {
 $array[] =[$key->created_at,  number_format($key->price, 2, '.', '')] ;
            }
 return $array;
    }



    

//*
public function getPricesbysymbol($name)
    {
      
         //Save the latest Trade 
       //  return now();   
     $myarray =   CoinPrices::where('name', $name)->get();
    foreach ($myarray as $key) {
 $array[] =[$key->data,  number_format($key->price, 2, '.', '')] ;
            }
            
 return $array;
    }

  

public function candlesticks($ticker,$time)
    {

return $this->api->candlesticks($ticker, $time);

 }

public function getpairs()
    {

/**  
$ticker ='BTCUSDT';
$TradingBots = new TradingBots;
$TradingBots->name = "Xpro 99";
$TradingBots->stop_percent = 2;
$TradingBots->interval = 15;
$TradingBots->target_percent = 2;
$TradingBots->ticker = $ticker;
$TradingBots->price = $this->api->price($ticker);
$TradingBots->save();

**/



/**
$CoinPairs = new CoinPairs;
$CoinPairs->name = "ETHUSDT";
$CoinPairs->save();
**/


 return $allowedCrypto = CoinPairs::all()->pluck('name');



      
    }


   public function checkPrices()
    {
     $allowedCrypto = CoinPairs::all()->pluck('name')->toArray();
        //Get all prices via the API
       $ticker = $this->api->prices();
        $prices = array();

     

        //Go though each ticker and save price
        foreach ($ticker as $name => $value) {
            //Check if we are working with the Ticker
 if (in_array($name, $allowedCrypto)) {

    $prices[] =[

    'name' =>$name,
     'price' =>  $value,
     //'data'=> Carbon::now()->timestamp,
     //'created_at'=> new \MongoDB\BSON\UTCDateTime(now()),
     'created_at'=>   Carbon::now(),
   
     ];
               
                
          }
        }

       

         //Save the latest Trade    
                CoinPrices::insert($prices);
                


       // return $CoinPrices;
    }



    /**
* Calcula en porcentaje, el cambio entre 2 números.
* e.g from 1000 to 500 = 50%
* 
* @param oldNumber The initial value
* @param newNumber The value that changed
*/
function getPercentageChange($oldNumber, $newNumber){
    $decreaseValue = $oldNumber - $newNumber;

    return ($decreaseValue / $oldNumber) * 100;
}




     public function checkBots()
    {   $allowedCrypto = CoinPairs::all()
        ->pluck('name')->toArray();
        //Get all prices via the API
       $TradingBots = TradingBots::all();
        $trades = array();


        // get old bot in minutes var
        $oldTrades_minutes = 15;

        //Go though each ticker and save price
        foreach ($TradingBots as $bot) {
            //For testing buy/sell
           
            //Check if we are working with the Ticker
            if (in_array($bot->ticker, $allowedCrypto)) {
                $traded = false;
                $percentChange = 0;
                $last_price = 0;
                $percentChangeTrade = 0;
                
                //Get last trade made
                
                $tradeArray = array();
                //$cryptoTradingBotGet = new CryptoTradingBot;
                
           $coinPrices = CoinPrices::where('name', $bot->ticker)->whereBetween('created_at', [ Carbon::now()->subMinutes($oldTrades_minutes), Carbon::now()])->get()->last();
                

                //Check we have some trades in the system
                if ($coinPrices) {
                    //Get the percentage change between now and 10 mins ago
                    /**
                    $last_price = $coinPrices->price;
                    $decreaseValue = $bot->price - $coinPrices->price;
                    $percentChange = round(($decreaseValue / $coinPrices->price) * 100, 2);
                      **/
                  $percentChange =   $this->getPercentageChange($coinPrices->price,$bot->price);
                }

               
                //Create Ticker
                $tradeArray['ticker']    = $bot->ticker;
                $tradeArray['gain']      = $percentChange . '%';
                $tradeArray['change_percent']      = $percentChange;
               // $tradeArray['last_price']  = $last_price;
                $tradeArray['latest_price']    = $coinPrices->price;
                $tradeArray['init_price']    = $bot->price;
                 $tradeArray['created_at']    = $bot->created_at;
               

                //Push to array
                array_push($trades, $tradeArray);
            
                
                
            }
        }

        return $trades;
    }







   


     }// end class