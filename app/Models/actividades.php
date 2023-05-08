<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    use HasFactory;

    protected $guarded = []; 

    static $rules = [
        'title'=>'require',
        'color'=>'require',
        'star'=>'require',
        'end'=>'require'
    ];
   
}
