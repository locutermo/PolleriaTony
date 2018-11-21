<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'stock',
        'category',
        'price',
        'wait_time'
    ];

    public function orders()
    {
      return $this->belongsToMany('App\Order', 'orders_products')->withPivot('quantify');
    }
    
}
