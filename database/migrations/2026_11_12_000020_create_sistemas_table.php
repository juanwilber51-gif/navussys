<?php
// Migracion para la tabla sistemas en Laravel 12
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecuta la creacion de la tabla de sistemas web
    public function up(): void
    {
        // Define la estructura de sistemas
        Schema::create('sistemas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // Clave foranea
            $table->string('nombre', 150); // Nombre del sistema
            $table->string('slug', 150); // Slug URL
            $table->string('descripcion_corta', 255); // Resumen
            $table->text('descripcion_larga'); // Descripcion completa
            $table->decimal('precio_base', 10, 2); // Precio licencia comercial
            $table->decimal('precio_codigo_fuente', 10, 2); // Precio codigo fuente
            $table->string('tecnologias', 255); // Stack tecnologico
            $table->text('caracteristicas'); // Caracteristicas
            $table->string('demo_url', 255)->nullable(); // URL de demo
            $table->string('imagen', 255)->nullable(); // Imagen
            $table->boolean('destacado')->default(false); // Destacado
            $table->integer('ventas_count')->default(0); // Cantidad de ventas
            $table->decimal('calificacion', 2, 1)->default(5.0); // Puntuacion
            $table->boolean('estado')->default(true); // Activo o no
            $table->timestamps(); // Fechas
        });
    }

    // Revierte la creacion
    public function down(): void
    {
        Schema::dropIfExists('sistemas');
    }
};
