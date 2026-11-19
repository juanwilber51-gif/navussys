<?php
// Modelo Eloquent para Pedidos y Cotizaciones en Laravel 12
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    // Nombre de la tabla
    protected $table = 'pedidos';

    // Campos asignables en masa
    protected $fillable = [
        'sistema_id',
        'cliente_nombre',
        'cliente_email',
        'cliente_telefono',
        'tipo_licencia',
        'servicios_adicionales',
        'precio_total',
        'estado',
        'observaciones'
    ];

    // Relacion de pertenencia con el sistema
    public function sistema(): BelongsTo
    {
        // Retorna la relacion con el sistema
        return $this->belongsTo(Sistema::class, 'sistema_id');
    }
}
