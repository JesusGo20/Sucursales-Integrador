<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\sucursalController;
use App\Models\Medico;
use App\Models\Persona;
use App\Models\sucursales;
use Illuminate\Support\Facades\Route;
use App\Models\especialidades;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $sucursales = sucursales::all();
    $medicos = Medico::all();
    $especialidades = especialidades::all();
    return view('sucursales', compact('sucursales', 'medicos', 'especialidades'));
});

Route::post('/sucursal', [sucursalController::class, 'store']);
Route::match(['post', 'patch'], '/sucursal/{id}', [sucursalController::class, 'update']);
