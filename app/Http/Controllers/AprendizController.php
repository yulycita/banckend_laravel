<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AprendizController extends Controller
{
    // Listar todos los aprendices
    public function index()
    {
        return response()->json(Aprendiz::all());
    }

    // Crear un aprendiz
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'email'            => 'required|email|unique:aprendices,email',
            'telefono'         => 'required|string|max:20',
            'direccion'        => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero'           => 'required|string|max:50',
            'programa'         => 'required|string|max:255',
            'ficha'            => 'required|string|max:20',
            'numero_documento' => 'required|string|unique:aprendices,numero_documento',
        ]);

        $aprendiz = Aprendiz::create($datos);

        return response()->json($aprendiz, 201);
    }

    // Buscar un aprendiz por id
    public function show(Aprendiz $aprendiz)
    {
        return response()->json($aprendiz);
    }

    // Actualizar un aprendiz
    public function update(Request $request, Aprendiz $aprendiz)
    {
        $datos = $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'email'            => ['required', 'email', Rule::unique('aprendices', 'email')->ignore($aprendiz->id)],
            'telefono'         => 'required|string|max:20',
            'direccion'        => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero'           => 'required|string|max:50',
            'programa'         => 'required|string|max:255',
            'ficha'            => 'required|string|max:20',
            'numero_documento' => ['required', 'string', Rule::unique('aprendices', 'numero_documento')->ignore($aprendiz->id)],
        ]);

        $aprendiz->update($datos);

        return response()->json($aprendiz);
    }

    // Eliminar un aprendiz
    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();

        return response()->json(['mensaje' => 'Aprendiz eliminado']);
    }
}