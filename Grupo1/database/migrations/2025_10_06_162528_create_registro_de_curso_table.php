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
        Schema::create('registro_de_curso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del curso
            $table->string('CEDULA'); // Cédula del alumno
            $table->timestamps();

            // Llave foránea
            $table->foreign('CEDULA')->references('CEDULA')->on('alumnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_de_curso');
    }
};
