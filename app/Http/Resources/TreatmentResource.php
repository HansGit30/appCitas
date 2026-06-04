<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Estructura basada en Tratamientos de image_337a3a.png
        return [
            'id'                        => $this->id_tratamiento,
            'nombre'                    => $this->nombre,
            'descripcion'               => $this->descripcion,
            'duracion'                  => $this->duracion,
            'diagnostico_id'            => $this->diagnostico_id,
            'medico_id'                 => $this->medico_id,
            'estado'                    => $this->estado,
            'frecuencia_administracion' => $this->frecuencia_administracion,
            'created_at'                => $this->created_at,
            'updated_at'                => $this->updated_at,
        ];
    }
}