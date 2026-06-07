<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Reglas basadas en Citas de image_3390df.png
        return [
            // 'date' permite formatos más flexibles que 'date_format'
            'fecha'         => 'required|date',

            // 'nullable' permite que si el campo está vacío, no falle
            'motivo'        => 'nullable|string|max:255',

            // Mantenemos 'exists' porque esto es vital para evitar el error 1452
            'id_paciente'   => 'required|integer|exists:patients,id_paciente',
            'id_medico'     => 'required|integer|exists:doctors,id_medico',

            'estado'        => 'required|string|max:50',
            'observaciones' => 'nullable|string',
            'sala'          => 'nullable|string|max:50',
        ];
    }
}
