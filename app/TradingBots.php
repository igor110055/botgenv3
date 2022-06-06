<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;
class TradingBots extends Model
{
    //

   // protected $primaryKey = 'id';
    //protected $connection = 'mongodb';
    protected $collection = 'trading_bots';
    protected $fillable = ['id','name','interval','stop_percent','target_percent','currency_capital','max_purchase_amount','purchase_percent','type','ticker','price','created_at'];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
     //   'id' => 'integer',
    ];  


}
