<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'worker_id',
        'table_id',
        'observation',
        'totalPrice',
        'state',
        'date',
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

   
    public function getState(){
        
      switch ($this->state) {
        case 1:
          return "Pendiente";
          break;
          case 2:
            return "Activo";
            break;
            case 3:
              return "finalizado";
              break;
              
          case 4:
          return "Cancelado";
          break;

        default:
          return "No definido";
          break;
      }
  }

    
}
