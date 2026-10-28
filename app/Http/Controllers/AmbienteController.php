<?php
 
namespace App\Http\Controllers;
 
use App\Services\AmbienteServices;
use App\Http\Requests\RequestAmbiente;
 
class AmbienteController extends Controller
{
    public function __construct(private AmbienteService $ambienteService)
    {
    }
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->ambienteService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los ambientes correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestAmbiente $request)
    {
        $registroAmbiente = $this->ambienteService->create($request->validated());
               
        return response()->json([
            'message' => 'El ambiente se creó correctamente',
            'datosRegistrados' => $registroAmbiente
        ], 201);
    }
 
   // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->ambienteService->getById($id);
 
        if (!$registro) {
            return response()->json([
                'message' => 'no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }
 
    // Actualizar un registro
    public function update(RequestAmbiente $request, string $id)
    {
        
        $registroActualizado = $this->ambienteService->update($id, $request->validated());
 
        if (!$registroActualizado) {
            return response()->json([
                'message' => 'no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }
 
    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->ambienteService->delete($id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'El ambiente se eliminó correctamente',
        ], 200);
    }
 
    public function findByName(string $name)
    {
        $registros = $this->ambienteService->findByName($name);
 
        return response()->json([
            'message' => 'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }

    public function findByCode(string $codigo)
    {
        
        $registros = $this->ambienteService->findByCode($codigo);
 
        return response()->json([
            'message' => 'Se listó correctamente por código',
            'data' => $registros
        ], 200);
    }

    public function findByType(string $tipo)
    {
        $registros = $this->ambienteService->findByType($tipo);
 
        return response()->json([
            'message' => 'Se listó correctamente por tipo',
            'data' => $registros
        ], 200);
    }
}