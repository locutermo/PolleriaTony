<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'worker_id',
        'table_id',
        'observation',
        'state',
        'totalTimeout',
       
    ];

    public function worker()
    {
      return $this->belongsTo('App\Worker','worker_id');
    }

    public function table()
    {
      return $this->belongsTo('App\Table','table_id');
    }

    public function products()
    {
      return $this->belongsToMany('App\Product', 'orders_products')->withPivot('quantify');
    }


}
