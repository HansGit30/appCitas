<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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