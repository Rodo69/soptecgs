<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    use HasFactory;

    static $rules = [
        'title'=>'required',
        'color'=>'required',
        'start'=>'required',
        'end'=>'required',
    ];

    protected $fillable = [
    'title', 
    'color', 
    'start',
    'end'
]; 
   
}
