<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        return Informe::all();
    }

    public function store(Request $request)
    {
        $informe = Informe::create($request->all());
        return response()->json($informe, 201);
    }

    public function show($id)
    {
        return Informe::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $informe = Informe::findOrFail($id);
        $informe->update($request->all());
        return response()->json($informe, 200);
    }

    public function destroy($id)
    {
        Informe::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}