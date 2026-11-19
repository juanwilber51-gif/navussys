<?php
// Modelo Eloquent para Mensajes de Contacto en Laravel 12
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensajeContacto extends Model
{
    // Nombre de la tabla
    protected $table = 'mensajes_contacto';

    // Campos permitidos
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'asunto',
        'mensaje',
        'leido'
    ];
}
