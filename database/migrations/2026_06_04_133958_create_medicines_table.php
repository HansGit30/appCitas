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
        Schema::create('medications', function (Blueprint $table) {
            // ID personalizado para el medicamento
            $table->id('id_medicamento');
            
            // Columnas de image_33f5e2.png
            $table->string('nombre');
            $table->string('dosis');
            $table->string('frecuencia');
            $table->string('duracion');
            
            // Llave foránea que referencia al ID del tratamiento creado arriba
            $table->foreignId('id_tratamiento')->constrained('treatments', 'id_tratamiento')->onDelete('cascade');
            
            $table->string('proveedor'); // Respetando la mayúscula de la imagen
            $table->string('efecto'); // El espacio se adaptará como un string normal

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};