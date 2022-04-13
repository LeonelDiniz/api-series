<?php
namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();

    }

    public function store(Request $request)
    {
        return response()
        ->json(Serie::create($request->all()),
        status: 201
    );
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
                return response()->json(data: ' ', status:204);

        }
        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], status: 404);
        }
        $serie->fill($request->all());
        $serie->save();

        return $serie;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Serie::destroy($id);
    if ($qtdRecursosRemovidos === 0) {
        return response()->json([
            'erro' => 'Recurso não encontrado'
        ], status:404);
    }

    return response()->json(data: ' ', status: 204);
    }

}
