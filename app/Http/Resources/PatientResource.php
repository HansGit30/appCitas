<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Estructura basada en Pacientes de image_337e1e.png
        return [
            'id'               => $this->id_paciente,
            'nombre'           => $this->nombre,
            'apellido'         => $this->apellido,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero'           => $this->genero,
            'telefono'         => $this->telefono,
            'direccion'        => $this->direccion,
            'tipo_sangre'      => $this->tipo_sangre,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}