<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class checklist extends Model
{
    use HasFactory;

    public function sucursal(){
       return $this ->hasOne(sucursales::class,'id' ,'sucursal_name');
      // return $this->hasMany('App\Models\Sucursales','sucursal_name');
    }

    protected $fillable = [
        'fecha_registro', 
        'foto_fachada', 
        'sucursal_name',
    ]; 
}
