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
        Schema::create('doctors', function (Blueprint $table) {
            // ID con nombre personalizado
            $table->id('id_medico');
            
            // Columnas solicitadas en la imagen image_33f9a3.png
            $table->string('nombre');
            $table->string('apellido');
            $table->string('especialidad');
            $table->string('telefono');
            $table->string('email');
            $table->string('licencia');
            $table->integer('años_experiencia'); // Tipo de dato entero para los años

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};