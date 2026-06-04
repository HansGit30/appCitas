<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
       
        return [
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero'           => 'required|string|max:50',
            'telefono'         => 'required|string|max:50',
            'direccion'        => 'required|string|max:255',
            'tipo_sangre'      => 'required|string|max:10',
        ];
    }
}
