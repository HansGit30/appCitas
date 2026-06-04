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
        Schema::create('treatments', function (Blueprint $table) {
            // ID personalizado para el tratamiento
            $table->id('id_tratamiento');
            
            // Columnas de image_33f5e2.png
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('duracion');
            
            // Llaves foráneas apuntando a tus IDs personalizados previos
            $table->foreignId('diagnostico_id')->constrained('diagnoses', 'id_diagnostico')->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('doctors', 'id_medico')->onDelete('cascade');
            
            $table->string('estado');
            $table->string('frecuencia_administracion');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};