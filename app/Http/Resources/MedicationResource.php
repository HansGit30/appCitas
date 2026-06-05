<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Estructura basada en Medicamentos de image_337a3a.png
        return [
            'id'                  => $this->id_medicamento,
            'nombre'              => $this->nombre,
            'dosis'               => $this->dosis,
            'frecuencia'          => $this->frecuencia,
            'duracion'            => $this->duracion,
            'tratamiento_id'      => $this->tratamiento_id,
            'Proveedor'           => $this->Proveedor, // Respetando la mayúscula
            'Efectos secundarios' => $this->{'Efectos secundarios'}, // Acceso dinámico para nombres con espacios
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}