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
        'lastname',
        'dni',
        'dateOfBirth',
        'cellphone',
        'email',
        'office',
        'photo',

        'code',
        'password',
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
        
          switch ($this->office) {
            case 1:
              return "Administrador";
              break;
              case 2:
                return "Despachador";
                break;
                case 3:
                  return "Mozo";
                  break;
            default:
              // code...
              break;
          }
      }

}
