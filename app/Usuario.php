<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['login', 'senha', 'email'];

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
