<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Reglas basadas en Medicamentos de image_338940.png
        return [
            'nombre'              => 'required|string|max:255',
            'dosis'               => 'required|string|max:100',
            'frecuencia'          => 'required|string|max:100',
            'duracion'            => 'required|string|max:100',
            'id_tratamiento'      => 'required|integer|exists:treatments,id_tratamiento', // Valida ID personalizado
            'proveedor'           => 'required|string|max:255', // Respetando la mayúscula de la imagen
            'efecto'              => 'required|string', // Campo adaptado como string normal
        ];
    }
}