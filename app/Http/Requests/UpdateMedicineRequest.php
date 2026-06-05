<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Reglas basadas en Medicamentos de image_338940.png
        return [
            'nombre'              => 'required|string|max:255',
            'dosis'               => 'required|string|max:100',
            'frecuencia'          => 'required|string|max:100',
            'duracion'            => 'required|string|max:100',
            'tratamiento_id'      => 'required|integer|exists:treatments,id_tratamiento', // Valida ID personalizado
            'Proveedor'           => 'required|string|max:255', // Respetando la mayúscula de la imagen
            'Efectos secundarios' => 'required|string|max:255', // Campo adaptado como string normal
        ];
    }
}
