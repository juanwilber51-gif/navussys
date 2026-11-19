<?php
// Migracion para la tabla pedidos en Laravel 12
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecuta la creacion de la tabla pedidos y cotizaciones
    public function up(): void
    {
        // Define la estructura de pedidos
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // Identificador del pedido
            $table->foreignId('sistema_id')->constrained('sistemas')->onDelete('cascade'); // Sistema solicitado
            $table->string('cliente_nombre', 120); // Nombre del cliente
            $table->string('cliente_email', 150); // Correo del cliente
            $table->string('cliente_telefono', 50); // Telefono / WhatsApp
            $table->string('tipo_licencia', 50)->default('comercial'); // Tipo de licencia
            $table->text('servicios_adicionales')->nullable(); // Adicionales
            $table->decimal('precio_total', 10, 2); // Monto total
            $table->string('estado', 30)->default('pendiente'); // Estado del pedido
            $table->text('observaciones')->nullable(); // Observaciones
            $table->timestamps(); // Fechas
        });
    }

    // Revierte la creacion
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
