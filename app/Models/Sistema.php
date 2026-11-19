<?php
// Modelo Eloquent para Sistemas Web en venta en Laravel 12
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sistema extends Model
{
    // Nombre de la tabla
    protected $table = 'sistemas';

    // Campos asignables en masa
    protected $fillable = [
        'categoria_id',
        'nombre',
        'slug',
        'descripcion_corta',
        'descripcion_larga',
        'precio_base',
        'precio_codigo_fuente',
        'tecnologias',
        'caracteristicas',
        'demo_url',
        'imagen',
        'destacado',
        'ventas_count',
        'calificacion',
        'estado'
    ];

    // Relacion inversa: un sistema pertenece a una categoria
    public function categoria(): BelongsTo
    {
        // Retorna la relacion de pertenencia
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relacion: un sistema puede tener multiples pedidos asociados
    public function pedidos(): HasMany
    {
        // Retorna la relacion uno a muchos con pedidos
        return $this->hasMany(Pedido::class, 'sistema_id');
    }
}
