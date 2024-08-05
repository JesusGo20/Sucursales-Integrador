<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    use HasFactory;
    protected $table = "sucursal";
    protected $fillable = ['nomSucursal', 'lugar', 'direccion', 'email', 'encargado', 'telefono', 'whatsApp', 'horaApertura', 'horaCierre',  'foto', 'estado'];

    public function encargados()
    {
        return $this->belongsTo('App\Models\medico', 'encargado', 'idMedicos');
    }

    public function especialidades()
    {
        return $this->belongsToMany(especialidades::class, 'especialidadessucursal', 'sucursal', 'especialidad');
    }
}
