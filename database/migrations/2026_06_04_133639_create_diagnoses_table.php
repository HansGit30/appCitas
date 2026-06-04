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
        Schema::create('diagnoses', function (Blueprint $table) {
            // ID personalizado para el diagnóstico
            $table->id('id_diagnostico');
            
            // Columnas y relaciones de image_33f65a.png
            $table->text('descripcion');
            $table->dateTime('fecha');
            
            // Llaves foráneas apuntando a tus IDs personalizados
            $table->foreignId('paciente_id')->constrained('patients', 'id_paciente')->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('doctors', 'id_medico')->onDelete('cascade');
            
            $table->string('gravedad');
            $table->text('recomendaciones');
            $table->string('tipo_diagnostico');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};