<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class AprendizMongo extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'aprendices';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'programa',
        'ficha',
        'numero_documento',
    ];
}