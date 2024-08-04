<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        return Ubicacion::all();
    }

    public function store(Request $request)
    {
        $ubicacion = Ubicacion::create($request->all());
        return response()->json($ubicacion, 201);
    }

    public function show($id)
    {
        return Ubicacion::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->update($request->all());
        return response()->json($ubicacion, 200);
    }

    public function destroy($id)
    {
        Ubicacion::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}