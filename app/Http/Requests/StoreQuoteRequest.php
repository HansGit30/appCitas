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
            'fecha'         => 'required|date_format:Y-m-d H:i:s',
            'motivo'        => 'required|string|max:255',
            'paciente_id'   => 'required|integer|exists:patients,id_paciente', // Valida que el ID personalizado exista
            'medico_id'     => 'required|integer|exists:doctors,id_medico',     // Valida que el ID personalizado exista
            'estado'        => 'required|string|max:50',
            'observaciones' => 'required|string',
            'sala'          => 'required|string|max:50',
        ];
    }
}