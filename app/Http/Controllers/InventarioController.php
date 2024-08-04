<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        return Inventario::all();
    }

    public function store(Request $request)
    {
        $inventario = Inventario::create($request->all());
        return response()->json($inventario, 201);
    }

    public function show($id)
    {
        return Inventario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->update($request->all());
        return response()->json($inventario, 200);
    }

    public function destroy($id)
    {
        Inventario::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}