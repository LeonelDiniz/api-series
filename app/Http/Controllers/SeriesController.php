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
        ->json(Serie::create(['nome' => $request->nome]),
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

}
