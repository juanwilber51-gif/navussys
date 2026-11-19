<?php
// Migracion para la tabla mensajes_contacto en Laravel 12
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecuta la creacion de la tabla mensajes_contacto
    public function up(): void
    {
        // Define la estructura de mensajes recibidos
        Schema::create('mensajes_contacto', function (Blueprint $table) {
            $table->id(); // Identificador del mensaje
            $table->string('nombre', 120); // Nombre del remitente
            $table->string('email', 150); // Correo
            $table->string('telefono', 50)->nullable(); // Telefono opcional
            $table->string('asunto', 150)->nullable(); // Asunto
            $table->text('mensaje'); // Mensaje
            $table->boolean('leido')->default(false); // Estado de lectura
            $table->timestamps(); // Fechas
        });
    }

    // Revierte la creacion
    public function down(): void
    {
        Schema::dropIfExists('mensajes_contacto');
    }
};
