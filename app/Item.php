<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['nome', 'quantidade', 'preco'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
