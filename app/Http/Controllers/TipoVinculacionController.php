<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoVinculacionRequest;
use App\Services\TipoVinculacionService; // Ajusta el namespace según tu estructura de servicios

class TipoVinculacionController extends Controller
{
    public function __construct(private TipoVinculacionService $tipoVinculacionService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->tipoVinculacionService->getAll();

        return response()->json([
            'message' => "Se listaron los tipos de vinculación correctamente",
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(TipoVinculacionRequest $request)
    {
        $registroCreado = $this->tipoVinculacionService->create($request->validated());
                
        return response()->json([
            'message' => 'El tipo de vinculación se creó correctamente',
            'datosRegistrados' => $registroCreado
        ], 201);
    }

    // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->tipoVinculacionService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'Manito, no se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(TipoVinculacionRequest $request, string $id)
    {
        $registroActualizado = $this->tipoVinculacionService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'Manito, no se encontró el registro con ese id'
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
        $eliminado = $this->tipoVinculacionService->delete($id);
        
        if (!$eliminado) {
            return response()->json([
                'message' => 'Manito, no se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'El tipo de vinculación se eliminó correctamente',
        ], 200);
    }

    // Buscar por nombre
    public function findByName(string $name)
    {
        $registros = $this->tipoVinculacionService->findByName($name);

        return response()->json([
            'message' => 'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
}