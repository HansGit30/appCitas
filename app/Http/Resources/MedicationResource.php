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
            'id_tratamiento'      => $this->id_tratamiento,
            'proveedor'           => $this->proveedor, // Respetando la mayúscula
            'efectos'             => $this->efectos, // Acceso dinámico para nombres con espacios
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}