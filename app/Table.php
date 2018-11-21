<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'number',
        'capacity',

    ];

    public function orders(){
        return $this->hasMany("App\Table","table_id");
    }

}
