<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function store(Request $request){
        $persona = Persona::create($request->all());
        return response()->json($persona,201);
    }
}
