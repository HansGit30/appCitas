<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteRequest extends FormRequest
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
        // Reglas basadas en Citas de image_3390df.png
        return [
            'fecha'         => 'required|date_format:Y-m-d H:i:s',
            'motivo'        => 'required|string|max:255',
            'paciente_id'   => 'required', // Valida que el ID personalizado exista
            'medico_id'     => 'required',     // Valida que el ID personalizado exista
            'estado'        => 'required|string|max:50',
            'observaciones' => 'required|string',
            'sala'          => 'required|string|max:50',
        ];
    }
}
