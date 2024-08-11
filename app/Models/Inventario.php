<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    // Definir qué atributos se pueden asignar en masa
    protected $fillable = [
        'producto_id', 
        'cantidad', 
        'tipo_movimiento'
    ];

}