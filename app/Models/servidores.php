<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servidores extends Model
{
    use HasFactory;

    //protecded $fillable = ('nombre', 'sucursal')
    protected $guarded = []; //status

    public function sucursales()
     {
         return $this->belongsTo(sucursales::class, 'sucursalasig');
     }

}
