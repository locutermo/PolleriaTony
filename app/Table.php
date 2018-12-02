<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'number',
        'capacity',
        'state',
        

    ];

    public function orders(){
        return $this->hasMany("App\Table","table_id");
    }
    
    public function getState(){
        
        switch ($this->state) {
          case 1:
            return "Libre";
            break;
            case 2:
              return "Ocupado";
              break;
              case 3:
                return "Reservado";
                break;
  
          default:
            return "No definido";
            break;
        }
    }
}
