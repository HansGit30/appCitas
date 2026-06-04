<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            // ID personalizado para la cita
            $table->id('id_cita');
            
            // Columnas y relaciones de image_33f65a.png
            $table->dateTime('fecha');
            $table->string('motivo');
            
            // Llaves foráneas apuntando a tus IDs personalizados
            $table->foreignId('paciente_id')->constrained('patients', 'id_paciente')->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('doctors', 'id_medico')->onDelete('cascade');
            
            $table->string('estado');
            $table->text('observaciones');
            $table->string('sala');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};