<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Service\CompetenciaServices;

class CompetenciaController extends Controller
{
    public function __construct(private CompetenciaService $competenciaService)
    {
    }

    public function index()
    {
        $registros = $this->competenciaService->getAll();

        return response()->json([
            'message' => "Se listaron las competencias correctamente",
            'data' => $registros
        ], 200);
    }

    public function store(RequestCompetencia $request)
    {
        $registroCompetencia = $this->competenciaService->create($request->validated());

        return response()->json([
            'message' => 'La competencia se creó correctamente',
            'datosRegistrados' => $registroCompetencia
        ], 201);
    }

    public function show(string $id)
    {
        $registro = $this->competenciaService->getById($id);

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

    public function update(RequestCompetencia $request, string $id)
    {
        $registroActualizado = $this->competenciaService->update( $id, $request->validated());

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

    public function destroy(string $id)
    {
        $validar = $this->competenciaService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'La competencia se eliminó correctamente'
        ], 200);
    }

    
    public function findByName(string $name)
    {
        $registros = $this->competenciaService->findByName($name);

        return response()->json([
            'message' => 'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
    
    public function findByCode(int $codigo)
    {

    $registrocodigo = $this->competenciaService->findByCode($codigo);

        return response()->json([
            'message' => 'Se listó correctamente por codigo',
            'data' => $registrocodigo
        ], 200);
    }

    public function findByHour(int $horas)
    {
        $registrohoras = $this->competenciaService->findByHour($horas);

        return response()->json([
            'message' => 'Se listó correctamente por hora',
            'data' => $registrohoras
        ], 200);

    }

    public function findByHourAndName(int $horas, string $nombre)
    {
        $consulta = $this->competenciaService->findByHourAndName($horas, $nombre);

        if (!$consulta) {
            return response()->json([
                'message' => 'No se encontró el registro con esos registros'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $consulta
        ], 200);
    } 
}


 
