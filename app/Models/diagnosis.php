<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnoses';

    // Llave primaria personalizada definida en tus migraciones
    protected $primaryKey = 'id_diagnostico';

    protected $fillable = [
        'descripcion',
        'fecha',
        'paciente_id', // Campo relacional
        'medico_id',   // Campo relacional
        'gravedad',
        'recomendaciones',
        'tipo_diagnostico'
    ];
}