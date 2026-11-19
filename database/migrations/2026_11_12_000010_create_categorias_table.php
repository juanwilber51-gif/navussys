<?php
// Migracion para la tabla categorias en Laravel 12
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecuta la creacion de la tabla categorias
    public function up(): void
    {
        // Define la estructura de la tabla categorias
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // Identificador autoincremental
            $table->string('nombre', 100); // Nombre de la categoria
            $table->string('slug', 100)->unique(); // Slug para busquedas y filtros
            $table->string('icono', 50)->default('bi-laptop'); // Icono de Bootstrap
            $table->text('descripcion')->nullable(); // Descripcion breve
            $table->boolean('estado')->default(true); // 1 = Activo, 0 = Inactivo
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    // Revierte la migracion eliminando la tabla
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
