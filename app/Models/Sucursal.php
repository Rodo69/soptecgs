<!-- ee -->
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return $this->getKeyName();
        //return 'slug';
    }
}