<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getType(){
        
          switch ($this->type) {
            case 1:
              return "Jefe de Area";
              break;
              case 2:
                return "Mozo";
                break;
                case 3:
                  return "Cocinero";
                  break;
            default:
              // code...
              break;
          }
      }

}
