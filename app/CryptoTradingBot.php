<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class CryptoTradingBot extends Model
{
    //

   // protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $collection = 'crypto_trading_bot';
    protected $fillable = ['id','ticker','price'];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
     //   'id' => 'integer',
    ];  


}
