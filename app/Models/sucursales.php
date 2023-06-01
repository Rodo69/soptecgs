<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(categoria::class,'banco_azteca');
    }
    public function categoria1()
    {
        return $this->belongsTo(categoria::class,'presta_prenda');
    }
    public function categoria2()
    {
        return $this->belongsTo(categoria::class,'comercio');
    }

     public function servidores()
     {
        return $this->hasMany('App\Models\Servidor', 'sucursal');
     }
 
}
