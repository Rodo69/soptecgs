<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    use HasFactory;

    public function sucursales()
    {
        return $this->belongsTo(Sucursales::class,'sucursal_asig');
        
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'unidad_asig');
    }

    public function empleados()
    {
        return $this->belongsTo(Empleados::class,'empleado_asig');
    }
    protected $fillable = [
        'tipo', 
        'marca', 
        'modelo',
        'serie',
        'placa',
        'empleado_asig',
        'sucursal_asig',
        'unidad_asig',
        'nombre_equipo'
    ]; 

}
