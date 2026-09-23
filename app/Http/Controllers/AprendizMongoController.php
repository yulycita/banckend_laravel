<?php

namespace App\Http\Controllers;

use App\Models\AprendizMongo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AprendizMongoController extends Controller
{
    // Listar todos los aprendices de Mongo
    public function index()
    {
        return response()->json(AprendizMongo::all());
    }

    // Crear un aprendiz en Mongo
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'email'            => ['required', 'email', Rule::unique(AprendizMongo::class, 'email')],
            'telefono'         => 'required|string|max:20',
            'direccion'        => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero'           => 'required|string|max:50',
            'programa'         => 'required|string|max:255',
            'ficha'            => 'required|string|max:20',
            'numero_documento' => ['required', 'string', Rule::unique(AprendizMongo::class, 'numero_documento')],
        ]);

        $aprendiz = AprendizMongo::create($datos);

        return response()->json($aprendiz, 201);
    }

    // Buscar un aprendiz de Mongo por id
    public function show($id)
    {
        $aprendiz = AprendizMongo::findOrFail($id);

        return response()->json($aprendiz);
    }

    // Actualizar un aprendiz de Mongo
    public function update(Request $request, $id)
    {
        $aprendiz = AprendizMongo::findOrFail($id);

        $datos = $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'email'            => ['required', 'email', Rule::unique(AprendizMongo::class, 'email')->ignore($id, '_id')],
            'telefono'         => 'required|string|max:20',
            'direccion'        => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero'           => 'required|string|max:50',
            'programa'         => 'required|string|max:255',
            'ficha'            => 'required|string|max:20',
            'numero_documento' => ['required', 'string', Rule::unique(AprendizMongo::class, 'numero_documento')->ignore($id, '_id')],
        ]);

        $aprendiz->update($datos);

        return response()->json($aprendiz);
    }

    // Eliminar un aprendiz de Mongo
    public function destroy($id)
    {
        $aprendiz = AprendizMongo::findOrFail($id);
        $aprendiz->delete();

        return response()->json(['mensaje' => 'Registro eliminado']);
    }
}