<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';

    protected $fillable = [
        'nombre',
        'pais',
        'estado',
        'ciudad',
        'colonia',
        'codigo_p',
        'seccion',
        'capacidad',
        'img'
    ];
    
}