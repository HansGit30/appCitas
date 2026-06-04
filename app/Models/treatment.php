<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = 'treatments';

    // Llave primaria personalizada definida en tus migraciones
    protected $primaryKey = 'id_tratamiento';

    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'diagnostico_id', // Campo relacional
        'medico_id',      // Campo relacional
        'estado',
        'frecuencia_administracion'
    ];
}