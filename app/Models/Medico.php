<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = "medicos";
    protected $fillable = ['nombre','cedula','apellido1', 'apellido2', 'telefono', 'direccion', 'email','fechaRegistro'];
}
