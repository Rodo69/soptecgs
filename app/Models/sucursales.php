<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    use HasFactory;

     public function servidores()
     {
         return $this->hasMany('App\Models\Servidor', 'sucursal');
     }
}
