<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Estructura basada en Citas de image_337e1e.png
        return [
            'id'            => $this->id_cita,
            'fecha'         => $this->fecha,
            'motivo'        => $this->motivo,
            'paciente_id'   => $this->paciente_id,
            'medico_id'     => $this->medico_id,
            'estado'        => $this->estado,
            'observaciones' => $this->observaciones,
            'sala'          => $this->sala,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}