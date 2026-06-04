<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTreatmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Reglas basadas en Tratamientos de image_338940.png
        return [
            'nombre'                    => 'required|string|max:255',
            'descripcion'               => 'required|string',
            'duracion'                  => 'required|string|max:100',
            'diagnostico_id'            => 'required|integer|exists:diagnoses,id_diagnostico', // Valida ID personalizado
            'medico_id'                 => 'required|integer|exists:doctors,id_medico',           // Valida ID personalizado
            'estado'                    => 'required|string|max:50',
            'frecuencia_administracion' => 'required|string|max:255',
        ];
    }
}