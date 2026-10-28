<?php

namespace App\Http\Controllers;

use App\Services\NivelFormacionServices;
use App\Http\Requests\RequestsNivelFormacion;

class NivelFormacionController extends Controller
{
    public function __construct(
        private NivelFormacionServices $nivelFormacionServices
    ) {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->nivelFormacionServices->getAll();

        return response()->json([
            'message' => 'Se listaron los niveles de formación correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(RequestsNivelFormacion $requests)
    {
        $registroNivelFormacion = $this->nivelFormacionServices->create(
            $requests->validated()
        );

        return response()->json([
            'message' => 'El nivel de formación se creó correctamente',
            'datosRegistrados' => $registroNivelFormacion
        ], 201);
    }

    // Traer un registro por ID
    public function show(string $id)
    {
        $registro = $this->nivelFormacionServices->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el nivel de formación con ese ID'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el nivel de formación correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(RequestsNivelFormacion $requests, string $id)
    {
        $registroActualizado = $this->nivelFormacionServices->update(
            $id,
            $requests->validated()
        );

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el nivel de formación con ese ID'
            ], 404);
        }

        return response()->json([
            'message' => 'El nivel de formación se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->nivelFormacionServices->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el nivel de formación con ese ID'
            ], 404);
        }

        return response()->json([
            'message' => 'El nivel de formación se eliminó correctamente'
        ], 200);
    }

    // Buscar por nombre
    public function findByName(string $name)
    {
        $registros = $this->nivelFormacionServices->findByName($name);

        return response()->json([
            'message' => 'Se listaron los niveles de formación por nombre correctamente',
            'data' => $registros
        ], 200);
    }
}
