<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;
class CoinPrices extends Model
{
    //

   // protected $primaryKey = 'id';
    //protected $connection = 'mongodb';
    protected $collection = 'coin_prices';
    protected $fillable = ['id','ticker','price','created_at'];
    
    protected $dates = ['created_at'];
    public $timestamps = true;




        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'integer',
    ];  


}
