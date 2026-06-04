<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    // Llave primaria personalizada definida en tus migraciones
    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'genero',
        'telefono',
        'direccion',
        'tipo_sangre'
    ];
}