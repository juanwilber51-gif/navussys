<?php
// Modelo Eloquent para Categorias en Laravel 12
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    // Nombre de la tabla en base de datos
    protected $table = 'categorias';

    // Campos asignables masivamente
    protected $fillable = [
        'nombre',
        'slug',
        'icono',
        'descripcion',
        'estado'
    ];

    // Relacion de una categoria con muchos sistemas
    public function sistemas(): HasMany
    {
        // Retorna la relacion uno a muchos
        return $this->hasMany(Sistema::class, 'categoria_id');
    }
}
