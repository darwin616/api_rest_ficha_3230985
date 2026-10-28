<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FichaService;
use App\Http\Requests\FichaRequest;

class FichaController extends Controller
{
    public function __construct(private FichaService $fichaService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->fichaService->getAll();

        return response()->json([
            'message' => "Se listaron las fichas correctamente",
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(FichaRequest $request)
    {
        $registroFicha = $this->fichaService->create($request->validated());
               
        return response()->json([
            'message' => 'La ficha se creó correctamente',
            'datosRegistrados' => $registroFicha
        ], 201);
    }

    // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->fichaService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(FichaRequest $request, string $id)
    {
        $registroActualizado = $this->fichaService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->fichaService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'La ficha se eliminó correctamente',
        ], 200);
    }

    // Buscar por rango de fechas
    public function findByDate(Request $request)
    {
        $registros = $this->fichaService->findByDate($request->fecha_inicio, $request->fecha_fin);

        return response()->json([
            'message' => 'Se listó correctamente por fecha',
            'data' => $registros
        ], 200);
    }

    // Buscar por número de ficha
    public function findByNumber(string $numero)
    {
        $registro = $this->fichaService->findByNumber($numero);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró una ficha con ese número'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó correctamente por número',
            'data' => $registro
        ], 200);
    }

    // Buscar por estado
    public function findByState(string $estado)
    {
        $registros = $this->fichaService->findByState($estado);

        return response()->json([
            'message' => 'Se listó correctamente por estado',
            'data' => $registros
        ], 200);
    }
}
