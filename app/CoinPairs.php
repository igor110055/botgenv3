<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;
class CoinPairs extends Model
{
    //
  //  protected $connection = 'mongodb';
    protected $collection = 'coin_pairs';
    protected $fillable = ['id','name','created_at'];
    protected $dates = ['created_at'];
    public $timestamps = true;


        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
     //   'id' => 'integer',
    ];  


    
}
