<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    // Llave primaria personalizada definida en tus migraciones
    protected $primaryKey = 'id_cita';

    protected $fillable = [
        'fecha',
        'motivo',
        'paciente_id', // Campo relacional
        'medico_id',   // Campo relacional
        'estado',
        'observaciones',
        'sala'
    ];
}