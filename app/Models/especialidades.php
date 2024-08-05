<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidades extends Model
{
    use HasFactory;
    protected $table = "especialidades";
    protected $fillable = ['nombre', 'descripcion'];

    public function sucursales()
    {
        return $this->belongsToMany(sucursales::class, 'especialidadessucursal', 'especialidad', 'sucursal');
    }
}
