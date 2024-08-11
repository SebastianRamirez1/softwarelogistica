<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
        return response()->json(Inventario::all());
    }

    public function store(Request $request)
    {

        $inventario = Inventario::create($request->all());

        return response()->json($inventario, 201);
    }

    public function show($id)
    {
        return response()->json(Inventario::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'cantidad' => 'sometimes|integer',
            'precio' => 'sometimes|numeric'
        ]);

        $inventario = Inventario::findOrFail($id);
        $inventario->update($request->all());

        return response()->json($inventario, 200);
    }

    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return response()->json(null, 204);
    }
}
