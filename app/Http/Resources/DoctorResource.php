<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Estructura basada en Médicos de image_337e1e.png
        return [
            'id'               => $this->id_medico,
            'nombre'           => $this->nombre,
            'apellido'         => $this->apellido,
            'especialidad'     => $this->especialidad,
            'telefono'         => $this->telefono,
            'email'            => $this->email,
            'licencia'         => $this->licencia,
            'años_experiencia' => $this->años_experiencia,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}