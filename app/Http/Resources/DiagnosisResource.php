<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Estructura basada en Diagnósticos de image_337e1e.png
        return [
            'id'               => $this->id_diagnostico,
            'descripcion'      => $this->descripcion,
            'fecha'            => $this->fecha,
            'paciente_id'      => $this->paciente_id,
            'medico_id'        => $this->medico_id,
            'gravedad'         => $this->gravedad,
            'recomendaciones'  => $this->recomendaciones,
            'tipo_diagnostico' => $this->tipo_diagnostico,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}