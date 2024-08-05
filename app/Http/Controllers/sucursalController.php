<?php

namespace App\Http\Controllers;

use App\Models\sucursales;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class sucursalController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomSucursal' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:255',
            'whatsApp' => 'required|string|max:255',
            'encargado' => 'required|string|max:255',
            'horaApertura' => 'required',
            'horaCierre' => 'required',
            'estado' => 'required',
            'foto' => 'image|mimes:jpeg,bmp,png|max:2048',
            'especialidades' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->path();
            $imageData = base64_encode(file_get_contents($path));
            $validatedData['foto'] = $imageData;
        }
        $sucursal = Sucursales::create($validatedData);
        $especialidades = json_decode($request->input('especialidades'), true);
        $sucursal->especialidades()->attach($especialidades);
        return response()->json($sucursal, 201);
    }




    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomSucursal' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:255',
            'whatsApp' => 'required|string|max:255',
            'encargado' => 'required|string|max:255',
            'horaApertura' => 'required',
            'horaCierre' => 'required',
            'estado' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'especialidades' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->path();
            $imageData = base64_encode(file_get_contents($path));
            $validatedData['foto'] = $imageData;
        }
        $sucursal = Sucursales::findOrFail($id);
        $sucursal->update($validatedData);
        $especialidades = json_decode($request->input('especialidades'), true);
        if (is_array($especialidades)) {
            $sucursal->especialidades()->sync($especialidades);

            return response()->json($sucursal, 200);
        }
    }
}
