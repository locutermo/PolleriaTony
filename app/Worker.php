<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'user_id'.
        'name',
        'lastname',
        'dni',
        'birthday',
        'phone',
        'email',
        'type',
        'photo',
    ];

   public function orders(){
       return $this->hasMany("App\Order","worker_id");
   }

   public function user(){
       return $this->belongsTo("App\User","user_id");
   }

    public function getType(){
        
        switch ($this->type) {
          case 1:
            return "Jefe de Área";
            break;
            case 2:
              return "Despachador";
              break;
              case 3:
                return "Mozo";
                break;
          default:
            return "Desarrollador";
            break;
        }
    }


}
