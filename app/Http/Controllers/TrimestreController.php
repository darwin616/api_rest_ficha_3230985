<?php
 
namespace App\Http\Controllers;
 
use App\Services\TrimestreService;
use App\Http\Requests\RequestTrimestre;

class TrimestreController extends Controller
{
    public function __construct(private TrimestreService $trimestreService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->trimestreService->getAll();

        return response()->json([
            'message' => 'Se listaron los trimestres correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(RequestTrimestre $request)
    {
        $registroTrimestre = $this->trimestreService->create($request->validated());

        return response()->json([
            'message' => 'El trimestre se creó correctamente',
            'datosRegistrados' => $registroTrimestre
        ], 201);
    }

    // Traer un registro por ID
    public function show(string $id)
    {
        $registro = $this->trimestreService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el trimestre con ese ID'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el trimestre correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(RequestTrimestre $request, string $id)
    {
        $registroActualizado = $this->trimestreService->update(
            $id,
            $request->validated()
        );

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el trimestre con ese ID'
            ], 404);
        }

        return response()->json([
            'message' => 'El trimestre se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->trimestreService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el trimestre con ese ID'
            ], 404);
        }

        return response()->json([
            'message' => 'El trimestre se eliminó correctamente'
        ], 200);
    }

    // Buscar registros por nombre
    public function findByName(string $name)
    {
        $registros = $this->trimestreService->findByName($name);

        return response()->json([
            'message' => 'Se listaron los trimestres por nombre correctamente',
            'data' => $registros
        ], 200);
    }
}