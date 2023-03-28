<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    

    public function sucursales()
    {
        return $this->belongsTo(Sucursales::class,'sucursal_asignada');
        
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'unidad_asignada');
    }

}

