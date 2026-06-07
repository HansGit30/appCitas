<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $table = 'medications';

    // Llave primaria personalizada definida en tus migraciones
    protected $primaryKey = 'id_medicamento';

    protected $fillable = [
        'nombre',
        'dosis',
        'frecuencia',
        'duracion',
        'id_tratamiento', // Campo relacional
        'proveedor',
        'efecto'
    ];
}