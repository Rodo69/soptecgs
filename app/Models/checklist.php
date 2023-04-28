<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checklist extends Model
{
    use HasFactory;

    public function sucursal()
    {
        return $this->hasOne('App\Models\sucursales');
    }

}
